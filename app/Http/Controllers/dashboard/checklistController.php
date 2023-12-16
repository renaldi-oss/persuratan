<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    public function index() {

        return view('dashboard.checklist.index');
    }

    public function store(Request $request) {
        $request->validate([
            'pekerjaan_id' => 'required',
            'checklist' => 'required',
            'keterangan' => 'required',
        ]);

        $checklist = Checklist::create($request->all());

        return redirect()->route('checklist.index')->with('success', 'Checklist berhasil ditambahkan');
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

    public function update(Request $request, string $id) {
        $checklist = Checklist::find($id);

        $request->validate([
            'pekerjaan_id' => 'required',
            'checklist' => 'required',
            'keterangan' => 'required',
        ]);

        $checklist->update($request->all());

        return redirect()->route('checklist.index')->with('success', 'Checklist berhasil diubah');
    }
}
