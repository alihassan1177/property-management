<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class OwnerController extends Controller
{
    function index() {
        return view('admin.owners.index');
    }

    function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => UserType::Owner,
            'password' => bcrypt('password')
        ]);

        return redirect()->route('admin.owners.index');
    }
}
