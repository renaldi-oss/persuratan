<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Pekerjaan;
use App\Models\TemporaryFile;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Romans\Filter\IntToRoman;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(Pekerjaan::latest('updated_at')->get())
                ->addColumn('instansi', function($pekerjaan) {
                    return $pekerjaan->instansi->nama;
                })
                ->addColumn('attn', function($pekerjaan) {
                    return $pekerjaan->instansi->attn;
                })
                ->addColumn('due_date', function($pekerjaan) {
                    $date = Carbon::parse($pekerjaan->due_date)->format('d M Y');
                    $time = Carbon::parse($pekerjaan->due_date)->diffForHumans(now(),  CarbonInterface::DIFF_ABSOLUTE);
                    return isset($pekerjaan->due_date) ?  $date .'  | ' . $time : '-';
                })
                ->addColumn('status', function($pekerjaan) {
                    $status = $pekerjaan->status;
                    if ($status == 'penawaran') {
                        $badge = '<span class="badge badge1 badge-primary">Penawaran</span>';
                    } elseif ($status == 'on-going') {
                        $badge = '<span class="badge badge1 badge-warning">On-going</span>';
                    } elseif ($status == 'over-time') {
                        $badge = '<span class="badge badge1 badge-danger">Over-time</span>';
                    } elseif ($status == 'done') {
                        $badge = '<span class="badge badge1 badge-success">Done</span>';
                    } else {
                        $badge = '<span class="badge badge1 badge-secondary">Unknown</span>';
                    }
                    return $badge;
                })
                ->addColumn('action', function($pekerjaan) {
                    $btn = '<a href="' . route("pekerjaan.show", $pekerjaan->id) . '"class=" btn btn-block btn-outline-secondary"><i class="fas fa-solid fa-eye"></i></a>';
                    $btn .= '  ';
                    $btn .= '<a href="' . route("pekerjaan.edit", $pekerjaan->id) . '"class=" btn btn-block btn-outline-primary mb-01"><i class="fas fa-solid fa-pen"></i></a>';
                    $btn .= '  ';
                    $btn .= '<form action="' . route("pekerjaan.destroy", $pekerjaan->id) . '" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-block btn-outline-danger"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('dashboard.pekerjaan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pekerjaan.create',[
            'instansi' => Instansi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'instansi_id' => 'required',
            'lokasi' => 'required',
            'to_email' => 'required|email',
            'to_attn' => 'required'
        ]);
         
        $roman = new IntToRoman();
        $month = $roman->filter(date('m'));
        $id_surat = Pekerjaan::withTrashed()->max('id');
        $id_surat = $id_surat == 0 ? '001' : sprintf('%03d', $id_surat + 1);
        $no_surat = $id_surat . '/PEN/TKI/' . $month . '/' . date('Y');

        $request->merge([
            'no_surat' => $no_surat,
        ]);

        $pekerjaan = Pekerjaan::create(request()->all());

        return redirect()->route('pekerjaan.index')
                        ->with('status', 'success')
                        ->with('message', 'Pekerjaan '. $pekerjaan->nama .' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pekerjaan = Pekerjaan::find($id)->load('instansi');
        $media = $pekerjaan->getMedia('pekerjaan');
        return view('dashboard.pekerjaan.show', [
            'pekerjaan' => $pekerjaan,
            'media' => $media,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.pekerjaan.edit', [
            'pekerjaan' => Pekerjaan::find($id),
            'instansi' => Instansi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'instansi_id' => 'required',
            'lokasi' => 'required',
            'to_email' => 'required|email',
            'to_attn' => 'required'
        ]);
        if(Auth::user()->role == 'manager|finance') {
            $request->merge([
                'due_date' => $request->due_date ? Carbon::parse($request->due_date)->format('Y-m-d') : null,
            ]);     
            $request->validate([
                'nominal' => 'required|numeric',
                'no_kontrak' => 'required',
                'status' => 'required',
                'due_date' => 'required|date|after_or_equal:today',
            ]);
        }
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->update(request()->all());
        if($request->file) {
            foreach($request->file as $file) {
                $tmpfolder = TemporaryFile::where('folder', $file)->first();
                if($tmpfolder){
                    $pekerjaan->addMedia(storage_path('app/public/tmp/'. $file .'/' . $tmpfolder->filename))
                        ->toMediaCollection('pekerjaan');
                    Storage::deleteDirectory('public/tmp/'. $file);
                    $tmpfolder->delete();
                }
            }
        }
        return redirect()->route('pekerjaan.index')
                        ->with('status', 'success')
                        ->with('message', 'Pekerjaan '. $pekerjaan->nama .' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $nama = $pekerjaan->nama;
        $pekerjaan->delete();

        return redirect()->route('pekerjaan.index')
                        ->with('status', 'success')
                        ->with('message', 'Pekerjaan '. $nama .' berhasil dihapus');
    }

    public function download(Media $media)
    {
        return response()->download($media->getPath(), $media->file_name);
    }

    public function downloadAll(Pekerjaan $pekerjaan){
        $mediaItems = $pekerjaan->getMedia('pekerjaan');
        $mediaStream = MediaStream::create($pekerjaan->nama . '.zip')->addMedia($mediaItems);
    
        return $mediaStream->toResponse(request());
    }
    Public function deleteFile(Media $media){
        $media->delete();
        return redirect()->back()->with('status', 'success')->with('message', 'File berhasil dihapus');
    }
}
