<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use DataTables;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $instansi = Instansi::all();

            return datatables()->of($instansi)
                ->addColumn('action', function($instansi) {
                    $btn = '<a href="' . route("instansi.edit", $instansi->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '  ';
                    $btn .= '<form action="' . route("instansi.destroy", $instansi->id) . '" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.instansi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'lokasi' => 'required',
        ]);

        $instansi = Instansi::create($request->all());

        return redirect()->route('instansi.index')
            ->with('status', 'success')
            ->with('message', 'Instansi '. $instansi->nama .' berhasil ditambahkan');
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
        $instansi = Instansi::find($id);
        return view('dashboard.instansi.edit', [
            'instansi' => $instansi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $instansi = Instansi::find($id);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required|unique:instansis,email,'.$instansi->id,
            'lokasi' => 'required',
        ]);

        $instansi->update($request->all());

        return redirect()->route('instansi.index')
            ->with('status', 'success')
            ->with('message', 'Instansi '. $instansi->nama .' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instansi = Instansi::find($id);
        $instansi->delete();
        $nama = $instansi->nama;
        
        return redirect()->route('instansi.index')
            ->with('status', 'success')
            ->with('message', 'Instansi '. $nama .' berhasil dihapus');
    }
}
