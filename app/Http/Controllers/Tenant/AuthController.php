<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    function loginView() {
        return view('tenant.auth.login');
    }

    function login(Request $request)
    {
        if (auth()->guard('tenant')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('tenant.dashboard.index');
        } else {
            $this->errorNotification("User credentials not correct");
            return back();
        }
    }

    function logout() {
        auth('tenant')->logout();
        return redirect()->route('tenant.login');
    }

}
