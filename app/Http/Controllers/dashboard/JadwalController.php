<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwal = jadwal::where('work_order_id', $request->id)->get();

        return $jadwal;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $jadwal = jadwal::create([
            'work_order_id' => $request->id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return $jadwal;
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
        Jadwal::destroy($id);
    }
}
