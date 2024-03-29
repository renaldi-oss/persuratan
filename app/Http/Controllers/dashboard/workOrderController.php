<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkOrderController extends Controller
{

    public function index(Request $request)
    {
        // get pekerjaan data with instansi
        $wo = WorkOrder::with(['pekerjaan.instansi', 'surat'])->latest('updated_at')->get();
        if($request->ajax()) {
            return datatables()->of($wo)
            ->addColumn('instansi', function($wo) {
                return $wo->pekerjaan->instansi->nama;
            })
            ->addColumn('deskripsi', function($wo) {
                return Str::limit($wo->pekerjaan->deskripsi, 50);
            })
            ->addColumn('lokasi', function($wo) {
                return Str::limit($wo->lokasi, 20);
            })
            ->addColumn('due_date', function($wo) {
                $date = Carbon::parse($wo->due_date)->format('d M Y');
                $time = Carbon::parse($wo->due_date)->diffForHumans(now(),  CarbonInterface::DIFF_ABSOLUTE);
                return isset($wo->due_date) ?  $date .' | ' . $time : '-';
            })
            ->addColumn('action', function($wo) {
                $btn = '<a href="' . route("workorder.show", $wo->id) . '"class=" btn btn-block btn-outline-secondary"><i class="fas fa-solid fa-eye"></i></a>';
                return $btn;
            })
            ->make(true);
        }

        return view('dashboard.WorkOrder.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'pekerjaan_id' => 'required',
            'lokasi' => 'required',
            'due_date' => 'required',
        ]);

        $wo = new WorkOrder();
        $wo->pekerjaan_id = $request->pekerjaan_id;
        $wo->lokasi = $request->lokasi;
        $wo->due_date = $request->due_date;
        $wo->save();

        return redirect()->route('workorder.index')->with('success', 'Work Order berhasil dibuat');
    }


    public function show(string $id)
    {
        $workorder = WorkOrder::with(['surat','pekerjaan.instansi'])->find($id);
        return view('dashboard.WorkOrder.show', ['wo' => $workorder]);
    }

    // FUNCTION NAVIGASI
    public function navigasi(Request $request){
        session(['active_tab' => $request->tab]);
    }
}