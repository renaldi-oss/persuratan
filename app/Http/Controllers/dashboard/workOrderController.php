<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.WorkOrder.index');
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
