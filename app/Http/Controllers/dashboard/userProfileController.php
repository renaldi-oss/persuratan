<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.edit', compact('user'));
    }
   
    // Other methods for updating profile information, if needed
}
