<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyek;

class homeController extends Controller
{
    //
    public function index()
    {
        $proyek = Proyek::all();
        response()->json($proyek);
        return view('dashboard.index', ['proyek' => $proyek]);
    }

    public function viewProyek()
    {

    }
}
