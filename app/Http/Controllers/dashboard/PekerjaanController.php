<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Datatables;
use Carbon\Carbon;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(Pekerjaan::all())
                ->addColumn('client', function($pekerjaan) {
                    return $pekerjaan->instansi->nama;
                })
                ->addColumn('attn', function($pekerjaan) {
                    return $pekerjaan->instansi->attn;
                })
                ->addColumn('due_date', function($pekerjaan) {
                    $date = Carbon::parse($pekerjaan->due_date)->format('d M Y');
                    $time = Carbon::parse($pekerjaan->due_date)->diffForHumans();
                    return isset($pekerjaan->due_date) ?  $date .'  | ' . $time : '-';
                })
                ->addColumn('status', function($pekerjaan) {
                    $status = $pekerjaan->status;
                    if ($status == 'pending') {
                        return '<span class="badge1 badge-warning">Pending</span>';
                    } elseif ($status == 'accepted') {
                        return '<span class="badge1 badge-success">Accepted</span>';
                    } elseif ($status == 'rejected') {
                        return '<span class="badge1 badge-danger">Rejected</span>';
                    }
                })
                ->addColumn('action', function($pekerjaan) {
                    $btn = '<a href="' . route("pekerjaan.edit", $pekerjaan->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '  ';
                    $btn .= '<form action="' . route("pekerjaan.destroy", $pekerjaan->id) . '" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('dashboard.pekerjaan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
