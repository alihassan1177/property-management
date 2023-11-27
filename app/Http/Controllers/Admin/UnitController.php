<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserType;

class UnitController extends Controller
{
    function index()
    {
        return view('admin.units.index');
    }

    function create()
    {
        $owners = User::where(['user_type' => UserType::Owner])->latest()->get();
        return view('admin.units.create', compact('owners'));
    }
}
