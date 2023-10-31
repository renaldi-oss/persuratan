<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class workOrderController extends Controller
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
}
