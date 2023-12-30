<?php

namespace App\Http\Controllers\Owner;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResultNotification;

    function loginView()
    {
        return view('owner.auth.login');
    }

    function login(Request $request)
    {
        if (auth()->guard('owner')->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => UserType::Owner])) {
            return redirect()->route('owner.dashboard.index');
        } else {
            $this->errorNotification("User credentials not correct");
            return back();
        }
    }

    function logout()
    {
        auth('owner')->logout();
        return redirect()->route('owner.login');
    }
}
