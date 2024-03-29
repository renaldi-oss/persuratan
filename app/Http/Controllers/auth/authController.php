<?php

namespace App\Http\Controllers\auth;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class authController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('status', 'success')->with('message', 'welcome back! ' . Auth::user()->name);
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect()->route('login')->with('status', 'success')->with('message', 'You have been logged out!');
    }

    public function getAllUsersLastSeen()
    {
        $users = User::all();
        foreach ($users as $user) {
            if(Cache::has('user-is-online-' . $user->id))
            {
                $user->last_seen = 'Online';
            }
            else
            {
                $user->last_seen = $user->last_seen->diffForHumans();
            }
        }
        return $users;
    }

    public function autoLogin($role)
    {
        // batalkan jika bukan env local
        abort_unless(app()->environment('local'), 403);
    
        $userId = match ($role) {
            'finance' => 1,
            'manager' => 2,
            'engineer' => 3,
            default => abort(404),
        };
    
        // login untuk developer
        Auth::loginUsingId($userId);
        return redirect()->route('home')->with('status', 'success')->with('message', 'welcome back! ' . Auth::user()->name);
    }    
}
