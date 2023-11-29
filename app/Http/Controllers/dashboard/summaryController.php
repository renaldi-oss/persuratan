<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Support\MediaStream;


class summaryController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(Pekerjaan::
                // select('surat_no','nama')->
                latest('updated_at')->get())
                ->addColumn('action', function($pekerjaan) {
                    $btn = '<a href="' . route("pekerjaan.downloadAll", $pekerjaan->id) . '"class=" btn btn-block btn-outline-secondary"><i class="fas fa-solid fa-download" style="color: dimgrey"></i></a>';
                    $btn .= '  ';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('summary.index');
    }

    public function downloadAll(Pekerjaan $pekerjaan){
        $mediaItems = $pekerjaan->getMedia('pekerjaan');
        $mediaStream = MediaStream::create($pekerjaan->nama . '.zip')->addMedia($mediaItems);
    
        return $mediaStream->toResponse(request());
    }
}
