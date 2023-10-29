<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // get user data with roles
        if($request->ajax()) {
            $users = User::with('roles')->get();
        
            return datatables()->of($users)
                ->addColumn('roles', function($user) {
                    return $user->roles->pluck('name')->implode(', ');
                })
                ->addColumn('action', function($user) {
                    $btn = '<a href="' . route("manage-user.edit", $user->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '  ';
                    $btn .= '<a href="' . route("manage-user.destroy", $user->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);
        }
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all(); 
        return view('dashboard.users.create',
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'roles' => 'required'
        ]);

        if($request->fails()) {
            return response()->json([
                'errors' => $request->errors()->all()
            ]);
        }

        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
        
        return redirect()->route('manage-user')->with('success', 'User created successfully.');
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
        return view('dashboard.users.edit',[
            'user' => User::find($id), 
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
            return redirect()->route('manage-user')->with('error', 'User not found.');
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
        // ganti role
        $user->roles()->sync($request->input('roles'));

        $user->update($request->all());

        return redirect()->route('manage-user')->with('success', 'User updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('manage-user')->with('success', 'User deleted successfully.');
    }
}
