<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResultNotification;

    function loginView()
    {
        return view('admin.auth.login');
    }

    function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard.index');
        } else {
            $this->errorNotification("User credentials not correct");
            return back();
        }
    }

    function logout() {
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
