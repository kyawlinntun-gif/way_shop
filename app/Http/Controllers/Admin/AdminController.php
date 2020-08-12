<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('dashboard');
        }
        return redirect()->back()->with('fail', 'Username or password is invalid!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You are logged out successfully!');
    }
}
