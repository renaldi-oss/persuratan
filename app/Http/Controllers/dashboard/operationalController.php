<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Operational;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OperationalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // get operational data
        if($request->ajax()) {
            $operationals = Operational::with('pekerjaan.instansi')->get();

            return datatables()->of($operationals)
            ->addColumn('instansi', function($operational) {
                return $operational->pekerjaan->instansi->nama;
            })
            ->addColumn('action', function($operational) {
                $btn = '<div style="display: flex; align-items: center;">';
                $btn .= '<span style="background: #FFF8cc;  color: #FFA500; padding: 3px 8px; border-radius: 8px;">Menunggu Acc Admin</span>';
                $btn .= '<a href="' . route("operational.edit", $operational->id) . '" class="edit btn btn-sm" style=" color: #666;"><i class="fas fa-edit"></i></a>';
                $btn .= '</div>';
                $btn .= '<form action="' . route("operational.destroy", $operational->id) . '" method="POST">';
                $btn .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['action', 'instansi'])
            ->make(true);



        }
        return view('dashboard.operationalrequest.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaan = Pekerjaan::all();
        return view('dashboard.operationalrequest.create',
        [
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pekerjaan_id' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'status' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required',
        ]);

        $operational = Operational::create($request->all());

        return redirect()->route('operational')
            ->with('status', 'success')
            ->with('message', 'operational ' . $operational->kegiatan . ' created successfully.');
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
        $operational = Operational::find($id);
        $pekerjaan = Pekerjaan::all();
        return view('dashboard.operationalrequest.edit',[
            'operational' => $operational,
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $operational = Operational::find($id);

        if (!$operational) {
            return redirect()->route('operational')
            ->with('status', 'error')
            ->with('message', 'operational ' . $operational->kegiatan . ' not found.');
        }

        $operational->update($request->all());

        return redirect()
            ->route('operational')
            ->with('status', 'success')
            ->with('message', "Data ". $operational->kegiatan ." updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $operational = Operational::find($id);
        $name = $operational->kegiatan;
        $operational->delete();
        return redirect()->route('operational')
        ->with('status', 'success')
        ->with('message', 'operational ' . $name . ' deleted successfully.');
    }
}
