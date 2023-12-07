<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Property;
use App\Notifications\TaskCreated;
use App\Notifications\TaskRemoved;
use App\Notifications\TaskUpdated;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    use ResultNotification;

    function index()
    {
        $tasks = Task::with(['tenant', 'user'])->latest()->paginate(config('app.per_page_items'));
        return view('admin.tasks.index', compact('tasks'));
    }

    function create()
    {
        $property_id = request('unit');

        if (!isset($property_id)) {
            $properties = Property::with('owner')->get();
            return view('admin.tasks.create', compact('properties'));
        }

        $property = Property::where(['id' => $property_id])->with(['tenant', 'owner'])->firstOrFail();

        return view('admin.tasks.create', compact('property'));
    }

    function show($id)
    {
        $task = Task::with(['user', 'tenant'])->findOrFail($id);
        return view('admin.tasks.show', compact('task'));
    }

    function edit($id)
    {
        $task = Task::with(['user', 'tenant'])->findOrFail($id);
        $statuses = TaskStatus::cases();
        return view('admin.tasks.edit', compact('task', 'statuses'));
    }

    function store(Request $request)
    {

        if (!isset($request->assignee)) {
            $this->errorNotification("Task assignee is required");
            return redirect()->route('admin.tasks.create');
        }

        $assignee = $request->assignee;

        $rules = [
            'property_id' => 'required|exists:properties,id',
            'task_description' => 'required|max:4000',
            'due_date' => 'required',
        ];

        if ($assignee == "user") {
            $rules['user_id'] = 'required|exists:users,id';
        } else if ($assignee == "tenant") {
            $rules['tenant_id'] = 'required|exists:tenants,id';
        } else {
            $this->errorNotification("Assignee is invalid");
            return redirect()->route('admin.tasks.index');
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validated = $validator->validated();

        $additional_values = [
            'status' => TaskStatus::TakenBy
        ];

        $validated['due_date'] = \Carbon\Carbon::parse($validated['due_date']);

        $values = array_merge($validated, $additional_values);

        try {

            $task = Task::create($values);
            $this->successNotification("Task created successfully");

            if ($assignee == "user") {
                $receiver = $task->user;            
            }else{
                $receiver = $task->tenant;
            }

            Notification::send($receiver, new TaskCreated());

        } catch (\Exception $e) {
            info("TASK CONTROLLER => STORE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.tasks.index');
    }

    function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $statuses = array_map(function ($status) {
            return $status->value;
        }, TaskStatus::cases());

        $validator = Validator::make($request->all(), [
            'status' => ['required', Rule::in($statuses)]
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validated = $validator->validated();

        try {

            $task->update($validated);
            $this->successNotification("Task updated successfully");

            if ($task->tenant_id != null) {
                $receiver = $task->tenant;
            }else{
                $receiver = $task->user;
            }

            Notification::send($receiver, new TaskUpdated());

        } catch (\Exception $e) {
            info("TASK CONTROLLER => UPDATE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.tasks.index');
    }

    function delete($id)
    {
        $task = Task::findOrFail($id);

        if ($task->status == TaskStatus::Draft->value) {
            $task->delete();
            $this->successNotification("Task removed successfully");
            
            if ($task->tenant_id != null) {
                $receiver = $task->tenant;
            }else{
                $receiver = $task->user;
            }

            Notification::send($receiver, new TaskRemoved());
        } else {
            $this->errorNotification("Task cannot be deleted");
        }

        return redirect()->route('admin.tasks.index');
    }
}
