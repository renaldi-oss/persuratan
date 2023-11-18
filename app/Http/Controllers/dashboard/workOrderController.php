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
                $btn = '<a href="' . route("manage-users.edit", $pekerjaan->id) . '"class=" btn btn-block btn-outline-secondary"><i class="fas fa-solid fa-eye"></i></a>';
                $btn .= '  ';
                $btn .= '<a href="'. route("manage-users.edit", $pekerjaan->id) .'"class=" btn btn-block btn-outline-primary mb-01"><i class="fas fa-solid fa-pen"></i></a>';
                $btn .= '  ';
                $btn .= '<form action="' . route("manage-users.destroy", $pekerjaan->id) . '" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <button type="submit" class="btn btn-block btn-outline-danger"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button>';
                return $btn;
            })
            ->make(true);
        } else {
            return view('dashboard.WorkOrder.index');
        }

}
    public function detail()
    {
        return view('dashboard.WorkOrder.detail.index');
    }
    public function jadwal()
    {
        return view('dashboard.WorkOrder.detail.jadwal');
    }
    public function handleJadwal(Request $request)
    {
        return redirect('/jadwal');
    }
    public function purchaseRequest()
    {
        return view('dashboard.WorkOrder.detail.purchaseRequest');
    }
    public function handlePurchaseRequest(Request $request)
    {
        return redirect('/purchaseRequest');
    }
    public function addPrItem()
    {
        return view('dashboard.WorkOrder.detail.addPrItem');
    }
    public function checklist()
    {
        return view('dashboard.WorkOrder.detail.checklist');
    }
    public function handleChecklist(Request $request)
    {
        return redirect('/checklist');
    }
    public function qcPass()
    {
        return view('dashboard.WorkOrder.detail.qcPass');
    }
    public function handleQCPass(Request $request)
    {
        return redirect('/qcPass');
    }
    public function persuratan()
    {
        return view('dashboard.WorkOrder.detail.persuratan');
    }
    public function handlePersuratan(Request $request)
    {
        return redirect('/persuratan');
    }
    public function addPersuratan()
    {
        return view('dashboard.WorkOrder.detail.addPersuratan');
    }
}
