<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $tipe = request()->input('tipe');
        $id = request()->input('id');
        if ($request->ajax()) {
            $materials = Material::where('tipe', $tipe)->where('pekerjaan_id', $id)->get();

            return datatables()->of($materials)
                ->addColumn('action', function ($material) {
                    $btn = '<div style="display: flex; align-items: center;">';
                    $btn .= '<a href="' . route("material.edit", $material->id) . '" class="edit btn btn-sm" style=" color: #666;"><i class="fas fa-edit"></i></a>';
                    $btn .= '</div>';
                    $btn .= '<form action="' . route("material.destroy", $material->id) . '" method="POST">';
                    $btn .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                    $btn .= '</form>';
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
        $request->validate([
            'nama' => 'required',
            'brand' => 'required',
            'qty' => 'required',
            'estimated_price' => 'required',
            'tipe' => 'required',
            'toko' => 'required',
        ]);

        Material::create($request->all());
    }


}
