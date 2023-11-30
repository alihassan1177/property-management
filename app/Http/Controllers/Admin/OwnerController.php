<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ResultNotification;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{

    use ResultNotification;

    function index()
    {
        $owners = User::where(['user_type' => UserType::Owner])
            ->latest()
            ->paginate(config('app.per_page_items'));
        return view('admin.owners.index', compact('owners'));
    }

    function create()
    {
        return view('admin.owners.create');
    }

    function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:6|max:128',
                'email' => 'required|email|unique:users,email|max:256',
                'phone' => 'required|min:11|max:11|unique:users,phone'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validated = $validator->validated();


        try {
            User::create([
                'name' =>  $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'user_type' => UserType::Owner,
                'password' => bcrypt('password')
            ]);

            $this->successNotification('New Owner added successfully');
        } catch (\Exception $e) {
            info('OWNER CONTROLLER : STORE => ' . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.owners.index');
    }

    function show()
    {
        return view('admin.owners.show');
    }

    function edit()
    {
        return view('admin.owners.edit');
    }
}
