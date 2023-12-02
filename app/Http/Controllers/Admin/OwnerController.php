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
            ->withCount('property')
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
            User::$rules
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

    function update(Request $request, $id)
    {
        $owner = User::where(['user_type' => UserType::Owner, 'id' => $id])->firstOrFail();

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:6|max:128',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validated = $validator->validated();

        try {
            $owner->update([
                'name' =>  $validated['name']
            ]);

            $this->successNotification('Owner updated successfully');
        } catch (\Exception $e) {
            info('OWNER CONTROLLER : UPDATE => ' . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.owners.index');
    }

    function show($id)
    {  
        $owner = User::where(['user_type' => UserType::Owner, 'id' => $id])->with('property')->firstOrFail();
        return view('admin.owners.show', compact('owner'));
    }

    function edit($id)
    {
        $owner = User::where(['user_type' => UserType::Owner, 'id' => $id])->firstOrFail();
        return view('admin.owners.edit', compact("owner"));
    }

    function delete($id){
        $owner = User::where(['user_type' => UserType::Owner, 'id' => $id])->withCount('property')->firstOrFail();
        if ($owner->property_count == 0) {
            $owner->delete();
            $this->successNotification("Owner removed successfully");
        }else{
            $this->errorNotification("Owner cannot be removed");
        }
        return redirect()->route('admin.owners.index');
    }
}
