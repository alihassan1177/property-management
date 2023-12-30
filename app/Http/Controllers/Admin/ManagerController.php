<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ResultNotification;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    use ResultNotification;

    function index()
    {
        $managers = User::where(['user_type' => UserType::Manager])
            ->withCount('property')
            ->latest()
            ->paginate(config('app.per_page_items'));
        return view('admin.managers.index', compact('managers'));
    }

    function create()
    {
        return view('admin.managers.create');
    }

    function store(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:6|max:128',
                'email' => 'required|email|unique:users,email|max:256',
                'phone' => 'required|min:11|max:11|unique:users,phone',
                'address' => 'required|min:10|max:2000',
                'bank_number' => 'required|min:10|max:50|unique:users,bank_number'
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
                'user_type' => UserType::Manager,
                'password' => bcrypt('password'),
                'address' => $validated['address'],
                'bank_number' => $validated['bank_number']
            ]);

            $this->successNotification('New Manager added successfully');
        } catch (\Exception $e) {
            info('MANAGER CONTROLLER : STORE => ' . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.managers.index');
    }

    function update(Request $request, $id)
    {
        $owner = User::where(['user_type' => UserType::Manager, 'id' => $id])->firstOrFail();

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

            $this->successNotification('Manager updated successfully');
        } catch (\Exception $e) {
            info('MANGER CONTROLLER : UPDATE => ' . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.managers.index');
    }

    function show($id)
    {  
        $manager = User::where(['user_type' => UserType::Manager, 'id' => $id])->with('property')->firstOrFail();
        return view('admin.managers.show', compact('manager'));
    }

    function edit($id)
    {
        $manager = User::where(['user_type' => UserType::Manager, 'id' => $id])->firstOrFail();
        return view('admin.managers.edit', compact("manager"));
    }

    function delete($id){
        $manager = User::where(['user_type' => UserType::Manager, 'id' => $id])->withCount('property')->firstOrFail();
        if ($manager->property_count == 0) {
            $manager->delete();
            $this->successNotification("Manager removed successfully");
        }else{
            $this->errorNotification("Manager cannot be removed");
        }
        return redirect()->route('admin.managers.index');
    }

}
