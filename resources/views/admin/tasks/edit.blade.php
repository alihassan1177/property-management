@extends('layouts.admin.master')

@section('title', 'Edit Task')

@section('content')


<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Edit Task</h3>
    </div>
</div>

<div class="bg-light p-4 rounded">
    <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Task details form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Task
                </button>
            </div>
        </div>
    
        <div class="row g-5">
    
            <div class="col-12">
                <h5 class="text-uppercase text-primary mb-4">
                    Task information
                </h5>
    
                <div class="row g-5">
                    <div class="col-12">
                        <div class="mb-3">
                            <div>
                                <label for="status" class="form-label">Update Task Status:</label>
                                <select name="status" class="form-select" id="status">
                                    @foreach ($statuses as $status)
                                        <option @selected($task->status == $status->value) value="{{ $status->value }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <div>
                                <label for="task_description" class="form-label">Task Description:</label>
                                <textarea disabled readonly name="task_description" id="task_description" class="form-control" cols="30" rows="10">{{ $task->task_description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="task_description" class="form-label">Assignee:</label>
                            @if (!is_null($task->user))
                            <div>
                                <p>User - {{ $task->user->id }}. {{ $task->user->name }}</p>
                            </div>                        
                            @endif
        
                            @if (!is_null($task->tenant))
                            <div>
                                <p>Tenant - {{ $task->tenant->id }}. {{ $task->tenant->name }}</p>
                            </div>                        
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            
                            <label for="task_description" class="form-label">Due Date:</label>
                            <input type="text" class="form-control" disabled readonly value="{{ $task->due_date }}">
                            
                        </div>
                    </div>
                </div>


            </div>
    

        </div>
    
    </form>

</div>

@endsection

