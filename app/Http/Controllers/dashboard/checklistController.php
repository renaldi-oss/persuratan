<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Http\Controllers\Controller;
use App\Models\Material;

class ChecklistController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            return datatables()->of(Checklist::where('work_order_id', $request->id)->latest('updated_at')->get())
            ->addColumn('action', function ($checklist) {
                $btn = '<div class="d-flex justify-content-center">';
                $btn .= '<button type="button" class="btn btn-block btn-outline-danger delete-checklist" data-id="' . $checklist->id . '"><i class="fas fa-solid fa-trash" style="color: #dc3545;"></i></button>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function create(Request $request) {
        return view('dashboard.WorkOrder.Checklist.create',['work_order_id' => $request->id]);
    }

    public function store(Request $request) {
        $request->validate([
            'qty' => 'required',
        ]);
        $material = Material::find($request->material_id);
        Checklist::create([
            'work_order_id' => $request->wo_id,
            'material_id' => $request->material_id,
            'nama' => $material->nama,
            'qty' => $request->qty,
        ]);
        return response()->json(['success' => true]);
    }

    public function show(string $id) {
        $checklist = Checklist::find($id);
        return view('dashboard.checklist.show', [
            'checklist' => $checklist
        ]);
    }

    public function edit(string $id) {
        $checklist = Checklist::find($id);
        return view('dashboard.checklist.edit', [
            'checklist' => $checklist
        ]);
    }

    public function update(Request $request) {
        $checklist = Checklist::find($request->id);
        $request->validate([
            'status' => 'required',
        ]);
        $checklist->status = $request->status;
        $checklist->save();

        return response()->json(['success' => true]);
    }

    public function destroy(Request $request) {
        $checklist = Checklist::find($request->id);

        $nama = $checklist->nama;
        $checklist->delete();

        return response()->json(['success' => true, 'nama' => $nama]);
    }
}
