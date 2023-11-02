<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Proyek;
use App\Models\Operational;
use Illuminate\Http\Request;
use App\Models\Proyek;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $proyek = Proyek::all();
        response()->json($proyek);
        return view('dashboard.index', ['proyek' => $proyek]);
    }

    public function viewProyek()
    {

    }

    public function getProyek (Request $request)
    {
        // get proyeks data with instansi
        if($request->ajax()) {
            $proyeks = Proyek::join('instansis', 'proyeks.instansi_id', '=', 'instansis.id')
            ->select('proyeks.*', 'instansis.nama_instansi as instansi_nama')
            ->get();
            return datatables()->of($proyeks)
                ->rawColumns(['instansi'])
                ->make(true);
        }
    }

    public function getOperational (Request $request)
    {
        // get proyeks data with instansi
        if($request->ajax()) {
            $operationals = Operational::join('proyeks', 'operationals.proyek_id', '=', 'proyeks.id')
                            ->join('instansis', 'proyeks.instansi_id', '=', 'instansis.id')
                            ->select('operationals.*', 'instansis.nama_instansi as instansi_nama')
                            ->get();

            return datatables()->of($operationals)
                ->rawColumns(['instansi'])
                ->make(true);
        }
    }
}
