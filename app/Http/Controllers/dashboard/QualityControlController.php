<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\QualityControl;
use App\Models\TemporaryFile;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;

class QualityControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(QualityControl::where('work_order_id', $request->id)->latest('updated_at')->get())
                ->addColumn('created_at', function($qc) {
                    return Carbon::parse($qc->created_at)->format('d M Y');
                })
                ->addColumn('action', function($qc) {
                    $media = $qc->getMedia('quality_control');
                    $url = $media[0]->getUrl();
                    $btn = '<div class="d-flex justify-content-center">';
                    $btn .= '<a href="' . $url . '" class="btn btn-block btn-outline-secondary" target="_blank"><i class="fas fa-solid fa-eye"></i></a>';
                    $btn .= '<form action="' . route("quality-control.destroy", $qc->id) . '" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-block btn-outline-danger"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button>
                            </form>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('Dashboard.WorkOrder.QualityControl.create', [
            'work_order_id' => $request->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'work_order_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);


        $qc = QualityControl::create([
            'work_order_id' => $request->work_order_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->file) {
                $tmpfolder = TemporaryFile::where('folder', $request->file)->first();
                if($tmpfolder){
                    $qc->addMedia(storage_path('app/public/tmp/'. $request->file .'/' . $tmpfolder->filename))
                        ->toMediaCollection('quality_control');
                    Storage::deleteDirectory('public/tmp/'. $request->file);
                    $tmpfolder->delete();
                }
        }

        $wo = $qc->workOrder->id;

        return redirect()->route('workorder.show', $wo)
        ->with('status', 'success')
        ->with('message', 'Data Quality Control berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qc = QualityControl::find($id);
        $qc->delete();
        $id = $qc->workOrder->id;
        
        return redirect()->route('workorder.show', $id)
        ->with('status', 'success')
        ->with('message', 'Data Quality Control berhasil dihapus');
    }

    public function download(Media $media)
    {
        return response()->download($media->getPath(), $media->file_name);
    }

    public function downloadAll(QualityControl $qc){
        $mediaItems = $qc->getMedia('quality_control');
        $nama = Str::limit($qc->deskripsi, 8, '');
        $mediaStream = MediaStream::create($nama . '.zip')->addMedia($mediaItems);
    
        return $mediaStream->toResponse(request());
    }
}
