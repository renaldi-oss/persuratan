<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\WorkOrder;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables()->of(Material::where('work_order_id', $request->id)->latest('updated_at')->get())
                ->addColumn('action', function ($material) {
                    $btn = '<div class="d-flex justify-content-center">';
                    $btn .= '<form action="' . route("quality-control.destroy", $material->id) . '" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-block btn-outline-danger"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button>
                            </form>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('dashboard.material.create');
    }

    public function store(Request $request)
    {
        $id = $request->input('work_order_id');
        $workorder = WorkOrder::with(['surat','pekerjaan.instansi'])->find($id);
        $request->validate([
            'nama' => 'required',
            'brand' => 'required',
            'qty' => 'required',
            'estimated_price' => 'required',
            'tipe' => 'required',
            'toko' => 'required',
        ]);

        $defautlTab = 'material';

        return dd($request->all());

        Material::createMaterial($request->all(), $id);


        // return redirect()->route('workorder.show', ['defaultTab' => $defautlTab, 'id' => $id])
        //     ->with('status', 'success')
        //     ->with('message', 'Material berhasil ditambahkan');

        // $request->validate([
        //     'nama' => 'required',
        //     'brand' => 'required',
        //     'qty' => 'required',
        //     'estimated_price' => 'required',
        //     'tipe' => 'required',
        //     'toko' => 'required',
        // ]);

        // Material::create($request->all());
    }


}
