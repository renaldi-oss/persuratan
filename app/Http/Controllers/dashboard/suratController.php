<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KodeSurat;
use App\Models\Surat;
use App\Models\TemporaryFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class suratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return datatables()->of(Surat::where('work_order_id', $request->id)->latest('updated_at')->get())
            ->addColumn('kode', function($surat) {
                return $surat->kodeSurat->kode;
            })
            ->addColumn('tipe', function($surat) {
                return $surat->kodeSurat->keterangan;
            })
            ->addColumn('mime_type', function($surat) {
                $media = $surat->getMedia('surat');
                return $media[0]->mime_type;
            })
            ->addColumn('created_at', function($surat) {
                return Carbon::parse($surat->created_at)->format('d M Y');
            })
            ->addColumn('action', function ($surat){
                $media = $surat->getMedia('surat');
                $url = $media[0]->getUrl();
                $btn = '<div class="d-flex justify-content-center">';
                $btn .= '<a href="' . $url . '" class="btn btn-outline-secondary mr-2" target="_blank"><i class="fas fa-solid fa-eye"></i></a>';
                $btn .= '<button type="button" class="btn btn-outline-danger delete-surat" data-id="' . $surat->id . '"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function ajaxsurat(Request $request){
        return response()->json(KodeSurat::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $kode = KodeSurat::where('id', $request->tipe)->first();
            $surat = Surat::create([
                'work_order_id' => $request->work_order_id,
                'kode_surat_id' => $kode->id,
                'deskripsi' => $request->deskripsi
            ]);
            
                            
            if($request->file) {
                $tmpfolder = TemporaryFile::where('folder', $request->file)->first();
                if($tmpfolder){
                    $surat->addMedia(storage_path('app/public/tmp/'. $request->file .'/' . $tmpfolder->filename))
                        ->toMediaCollection('surat');
                    Storage::deleteDirectory('public/tmp/'. $request->file);
                    $tmpfolder->delete();
                }
            }

    
            return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Request $request)
    {
        $surat = Surat::findOrFail($request->id);
        $surat->delete();
        return response()->json(['success' => true]);
    }
}
