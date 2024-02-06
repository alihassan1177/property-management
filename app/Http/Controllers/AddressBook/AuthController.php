<?php

namespace App\Http\Controllers\AddressBook;

use App\Http\Controllers\Controller;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    use ResultNotification;

    function login(Request $request)
    {
        if (auth()->guard('address_book')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('address_book.dashboard.index');
        } else {
            $this->errorNotification("User credentials not correct");
            return back();
        }
    }

    function logout()
    {
        auth('address_book')->logout();
        return redirect()->route('address_book.login');
    }
    
    function loginView()
    {
        return view('address-book.auth.login');
    }
}
