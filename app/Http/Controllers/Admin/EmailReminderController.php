<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Enums\Util;
use App\Http\Controllers\Controller;
use App\Models\EmailReminder;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ResultNotification;
use Illuminate\Validation\Rule;

class EmailReminderController extends Controller
{

    use ResultNotification;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email_reminders = EmailReminder::latest()->paginate(config('app.per_page_items'));
        return view('admin.email-reminders.index', compact('email_reminders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = User::where(['user_type' => UserType::Manager])->get();
        $owners = User::where(['user_type' => UserType::Owner])->get();
        $tenants = Tenant::all();

        return view('admin.email-reminders.create', compact('managers', 'owners', 'tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $managers = User::where(['user_type' => UserType::Manager])->get();
        $owners = User::where(['user_type' => UserType::Owner])->get();
        $tenants = Tenant::all();

        $emails = array_map(function ($user) {
            return $user["email"];
        }, array_merge($managers->toArray(), $owners->toArray(), $tenants->toArray()));

        $validator = validator()->make($request->all(), [
            "name" => 'required|max:155',
            "reminder_date" => 'required|datetime',
            "email" => ['required', 'email', Rule::in($emails)],
            "message" => 'required|max:2000'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $additional_values = [
            'reminder_sent' => Util::No
        ];

        $values = array_merge($additional_values, $validator->validated());

        try {
            EmailReminder::create($values);
            $this->successNotification("New email reminder created successfully");
        } catch (\Exception $e) {
            info("ERROR : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.email-reminders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $email_reminder = EmailReminder::findOrFail($id);
        return view('admin.email-reminders.show', compact('email_reminder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $managers = User::where(['user_type' => UserType::Manager])->get();
        $owners = User::where(['user_type' => UserType::Owner])->get();
        $tenants = Tenant::all();

        $email_reminder = EmailReminder::findOrFail($id);
        return view('admin.email-reminders.edit', compact('email_reminder', 'managers', 'owners', 'tenants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $email_reminder = EmailReminder::findOrFail($id);

        $managers = User::where(['user_type' => UserType::Manager])->get();
        $owners = User::where(['user_type' => UserType::Owner])->get();
        $tenants = Tenant::all();

        $emails = array_map(function ($user) {
            return $user["email"];
        }, array_merge($managers->toArray(), $owners->toArray(), $tenants->toArray()));

        $validator = validator()->make($request->all(), [
            "name" => 'required|max:155',
            "reminder_date" => 'required|datetime',
            "email" => ['required', 'email', Rule::in($emails)],
            "message" => 'required|max:2000'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $email_reminder->update($validator->validated());
            $this->successNotification("Email reminder updated successfully");
        } catch (\Exception $e) {
            info("ERROR : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.email-reminders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $email_reminder = EmailReminder::findOrFail($id);
        try {
            $email_reminder->delete();
            $this->successNotification("Email reminder deleted successfully");
        } catch (\Exception $e) {
            info('ERROR : ' . $e->getMessage());
            $this->errorNotification('Something went wrong, please try again later');
        }

        return redirect()->route('admin.email-reminders.index');
    }
}
