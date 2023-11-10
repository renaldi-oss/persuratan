<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
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

    public function api()
    {
        $proyeks = Proyek::with('instansi')->get();
        $operationals = Operational::with('proyek.instansi')->get();
        dd($proyeks, $operationals);

    }

    public function getProyek (Request $request)
    {
        // get pekerjaan data with instansi
        if($request->ajax()) {
            $pekerjaans = Pekerjaan::with('instansi')
            ->get();

            return datatables()->of($pekerjaans)
            ->addColumn('instansi', function($pekerjaan) {
                return $pekerjaan->instansi->nama;
            })
            ->make(true);
        }
    }

    public function getOperational (Request $request)
    {
        // get proyeks data with instansi
        if($request->ajax()) {
            $operationals = Operational::with('pekerjaan.instansi')
            ->get();

            return datatables()->of($operationals)
            ->addColumn('instansi', function($operational) {
                return $operational->pekerjaan->instansi->nama;
            })
            ->make(true);
        }
    }
}
