<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Operational;
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
            $operationals = Operational::get();

            return datatables()->of($operationals)
    ->addColumn('roles', function($operational) {
        return $operational->roles->pluck('name')->implode(', ');
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
    ->rawColumns(['action', 'roles'])
    ->make(true);



        }
        return view('dashboard.operationalrequest.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('dashboard.operationalrequest.create',
        [
            'roles' => $roles
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

        $operational = Operational::create($request->all);

        return redirect()->route('operational')
            ->with('status', 'success')
            ->with('message', 'operational ' . $operational->name . ' created successfully.');
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
        $operational = operational::find($id);
        return view('dashboard.operationalrequest.edit',[
            'operational' => $operational,
            'roles' => Role::pluck('name', 'id')->all() // akan mengembalikan associative array
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $operational = operational::find($id);

        if (!$operational) {
            return redirect()->route('operational')
            ->with('status', 'error')
            ->with('message', 'operational ' . $operational->name . ' not found.');
        }
        Validator::make($request->all(), [
            'name' => 'required',
            'operationalname' => [
                'required',
                Rule::unique('operationals')->ignore($operational->id),
            ],
            'email' => [
                'required',
                Rule::unique('operationals')->ignore($operational->id),
            ]
        ])->validate();

        if($request->input('password')) {
            $request->merge(['password' => bcrypt($request->input('password'))]);
        } else {
            $request->merge(['password' => $operational->password]);
        }
        $operational->roles()->sync($request->input('roles'));

        $operational->update($request->all());

        return redirect()
            ->route('operational')
            ->with('status', 'success')
            ->with('message', "Data ". $operational->name ." updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $operational = operational::find($id);
        $name = $operational->name;
        $operational->delete();
        return redirect()->route('operational')
        ->with('status', 'success')
        ->with('message', 'operational ' . $name . ' deleted successfully.');
    }
}
