<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeSurat; 

class kodeSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kodeSurat = KodeSurat::all(); // Fix: Correct case for the model

            return datatables()->of($kodeSurat)
                ->addColumn('action', function ($kodeSurat) {
                    $btn = '<a href="' . route("kodeSurat.edit", $kodeSurat->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '  ';
                    $btn .= '<form action="' . route("kodeSurat.destroy", $kodeSurat->id) . '" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.kodeSurat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kodeSurat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required',
            'kode' => 'required',
            'keterangan' => 'required',
        ]);

        $kodeSurat = KodeSurat::create($request->all()); // Fix: Correct case for the model
    

        return redirect()->route('kodeSurat.index')
            ->with('status', 'success')
            ->with('message', 'KodeSurat ' . $kodeSurat->no . ' berhasil ditambahkan'); // Fix: Correct case for the model
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
        $kodeSurat = KodeSurat::find($id);
        return view('dashboard.kodeSurat.edit', [
            'kodeSurat' => $kodeSurat
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kodeSurat = kodeSurat::find($id);

        $request->validate([
            'no' => 'required',
            'kode' => 'required',
            'keterangan' => 'required',
            
        ]);

        $kodeSurat->update($request->all());

        return redirect()->route('kodeSurat.index')
            ->with('status', 'success')
            ->with('message', 'kodeSurat '. $kodeSurat->nama .' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kodeSurat = kodeSurat::find($id);
        $kodeSurat->delete();
        $nama = $kodeSurat->nama;
        
        return redirect()->route('kodeSurat.index')
            ->with('status', 'success')
            ->with('message', 'kodeSurat '. $nama .' berhasil dihapus');
    }
}
