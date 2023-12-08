<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function loginView()
    {
        return view('admin.auth.login');
    }

    function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard.index');
        } else {
            return back();
        }
    }

    function logout() {
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
