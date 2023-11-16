<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    //
    public function index(Request $request)
    {
        // get pekerjaan data with instansi
        if($request->ajax()) {
            $pekerjaans = Pekerjaan::with('instansi')
            ->get();

            return datatables()->of($pekerjaans)
            ->addColumn('instansi', function($pekerjaan) {
                return $pekerjaan->instansi->nama;
            })
            ->addColumn('action', function($pekerjaan) {
                $btn = '<a href="/workOrder/' . $pekerjaan->id . '/detail" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->make(true);
        }
        return view('dashboard.WorkOrder.index');

    }
    public function detail(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->no_surat, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.index', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function jadwal(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->no_surat, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.jadwal', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function purchaseRequest(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->no_surat, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.purchaseRequest', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function addPrItem(string $id)
    {
        return view('dashboard.WorkOrder.detail.addPrItem', ['id' => $id]);
    }
    public function checklist(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->no_surat, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.checklist', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function qcPass(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->no_surat, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.qcPass', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function persuratan(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->no_surat, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.persuratan', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function addPersuratan(string $id)
    {
        return view('dashboard.WorkOrder.detail.addPersuratan', ['id' => $id]);
    }
}
