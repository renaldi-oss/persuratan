<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Operational;
use App\Models\Pekerjaan;
use App\Models\Proyek;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $pekerjaan = Pekerjaan::limit(5)->get();
        response()->json($pekerjaan);
        return view('dashboard.index', ['pekerjaan' => $pekerjaan]);
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
