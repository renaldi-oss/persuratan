<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Pekerjaan;
use App\Models\PurchaseOrder;



class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = PurchaseOrder::select(['id', 'pekerjaan_id', 'surat_no', 'pekerjaan', 'requester', 'division', 'status']);
    
            // Check if the table is for pekerjaan_id IS NULL
            if ($request->has('pekerjaan_id_null') && $request->input('pekerjaan_id_null')) {
                $query->whereNull('pekerjaan_id');
            } else {
                $query->whereNotNull('pekerjaan_id');
            }
    
            $purchaseOrders = $query->get();
    
            return datatables()->of($purchaseOrders)
                ->addColumn('action', function ($purchaseOrder) {
                    // Add any additional action buttons or links here
                    return '<a href="' . route("purchase.edit", $purchaseOrder->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->toJson();
        }
    
        return view('dashboard.PurchaseOrder.index');
    }
    
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaans = Pekerjaan::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('dashboard.PurchaseOrder.create',
        [
            'roles' => $roles,
            'pekerjaans' => $pekerjaans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'type' => 'required',
            'instances' => 'required',
            'location' => 'required',
            'po' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        $user = User::create($request->all());
        $role = Role::find($request->input('roles'));
        $user->assignRole($role->name);

        return redirect()->route('purchase')
            ->with('status', 'success')
            ->with('message', 'User ' . $user->name . ' created successfully.');
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
        $user = User::find($id);
        return view('dashboard.PurchaseOrder.edit',[
            'user' => $user,
            'roles' => Role::pluck('name', 'id')->all() // akan mengembalikan associative array
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('purchase')
            ->with('status', 'error')
            ->with('message', 'User ' . $user->name . ' not found.');
        }
        Validator::make($request->all(), [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ]
        ])->validate();

        if($request->input('password')) {
            $request->merge(['password' => bcrypt($request->input('password'))]);
        } else {
            $request->merge(['password' => $user->password]);
        }
        $user->roles()->sync($request->input('roles'));

        $user->update($request->all());

        return redirect()
            ->route('purchase')
            ->with('status', 'success')
            ->with('message', "Data ". $user->name ." updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $name = $user->name;
        $user->delete();
        return redirect()->route('purchase')
        ->with('status', 'success')
        ->with('message', 'User ' . $name . ' deleted successfully.');
    }
}
