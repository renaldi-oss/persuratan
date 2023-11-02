<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    //
    public function index()
    {
        return view('workOrder.index');
    }
    public function detail()
    {
        return view('workOrder.detail.index');
    }
    public function jadwal()
    {
        return view('workOrder.detail.jadwal');
    }
    public function handleJadwal(Request $request)
    {
        return redirect('/jadwal');
    }
    public function purchaseRequest()
    {
        return view('workOrder.detail.purchaseRequest');
    }
    public function handlePurchaseRequest(Request $request)
    {
        return redirect('/purchaseRequest');
    }
    public function checklist()
    {
        return view('workOrder.detail.checklist');
    }
    public function handleChecklist(Request $request)
    {
        return redirect('/checklist');
    }
    public function qcPass()
    {
        return view('workOrder.detail.qcPass');
    }
    public function handleQCPass(Request $request)
    {
        return redirect('/qcPass');
    }
    public function persuratan()
    {
        return view('workOrder.detail.persuratan');
    }
    public function handlePersuratan(Request $request)
    {
        return redirect('/persuratan');
    }
}
