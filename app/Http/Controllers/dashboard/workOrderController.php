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
    public function show(string $id)
    {
        $workorder = WorkOrder::with(['surat','pekerjaan.instansi'])->find($id);
        $defaultTab = 'material';
        return view('dashboard.WorkOrder.show', ['wo' => $workorder, 'id' => $id, 'defaultTab' => $defaultTab]);
    }

    public function detail(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->surat_no, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.index', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function jadwal(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->surat_no, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.jadwal', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function purchaseRequest(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->surat_no, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.purchaseRequest', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function addPrItem(string $id)
    {
        return view('dashboard.WorkOrder.detail.addPrItem', ['id' => $id]);
    }
    public function checklist(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->surat_no, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.checklist', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function qcPass(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->surat_no, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.qcPass', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function persuratan(string $id)
    {
        $pekerjaans = Pekerjaan::with('instansi')->find($id);
        preg_match('/^\d+/', $pekerjaans->surat_no, $matches);
        $pekerjaans->no_wo = $matches[0];

        return view('dashboard.WorkOrder.detail.persuratan', ['id' => $id, 'pekerjaans' => $pekerjaans]);
    }
    public function addPersuratan(string $id)
    {
        return view('dashboard.WorkOrder.detail.addPersuratan', ['id' => $id]);
    }

    // AJAX REQUEST
    public function getMaterial(Request $request)
    {
        if($request->ajax()) {
            // $data = Pekerjaan::with('instansi')->find($request->id);
            // return datatables()->of($data->material)
        }
    }


}
