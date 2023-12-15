<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\QualityControl;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;

class QualityControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(QualityControl::where('work_order_id', $request->id)->latest('updated_at')->get())
                ->addColumn('created_at', function($qc) {
                    return Carbon::parse($qc->created_at)->format('d M Y');
                })
                ->addColumn('action', function($qc) {
                    $media = $qc->getMedia('quality_control');
                    $url = $media[0]->getUrl();
                    $btn = '<div class="d-flex justify-content-center">';
                    $btn .= '<a href="' . $url . '" class="btn btn-block btn-outline-secondary" target="_blank"><i class="fas fa-solid fa-eye"></i></a>';
                    $btn .= '<form action="' . route("quality-control.destroy", $qc->id) . '" method="POST">
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get file media
        $qc = QualityControl::find($id);
        $media = $qc->getMedia('quality_control');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qc = QualityControl::find($id);
        $qc->delete();

        return redirect()->route('workorder.index')
                        ->with('status', 'success')
                        ->with('message', 'Data Quality Control berhasil dihapus');

    }
}
