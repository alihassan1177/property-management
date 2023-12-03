@extends('layouts.admin.master')

@section('title', 'Add New Task')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Task</h3>
    </div>
</div>


@if (!is_null(request('unit')))
<div class="bg-light p-4 rounded">
    <form method="POST" action="{{ route('admin.tasks.store') }}">
        @csrf

        <input type="text" hidden value="{{ $property->id }}" name="property_id">

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
                                <label for="task_description" class="form-label">Task Description:</label>
                                <textarea name="task_description" id="task_description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            @error('task_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="task_description" class="form-label">Assign To:</label>
                            <div>
                                <label class="form-label">
                                    <input checked name="assignee" id="assignee" value="user" type="radio">
                                    <small>Owner - {{ $property->owner->id }}. {{ $property->owner->name }}</small>
                                </label>
                                <input hidden name="user_id" value="{{ $property->owner->id }}" type="text">
                                @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
        
                            @if (!is_null($property->tenant))
                            <div>
                                <label class="form-label">
                                    <input name="assignee" id="assignee" value="tenant" type="radio">
                                    <small>Tenant - {{ $property->tenant->id }}. {{ $property->tenant->name }}</small>
                                </label>
                                <input hidden name="tenant_id" value="{{ $property->tenant->id }}" type="text">
                                @error('tenant_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>                        
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            
                            <label for="task_description" class="form-label">Due Date:</label>
                            <input min="{{ date("Y-m-d") }}" type="date" class="form-control" name="due_date" value="{{ old('due_date') }}">
                            @error('due_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>
    

        </div>
    
    </form>

</div>
@elseif (isset($properties))
<div class="bg-light p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">Select Unit</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address</th>
                    <th scope="col">Cadastral Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Owner Phone</th>
                </tr>
            </thead>
            <tbody>
                @if (!$properties->count())
                <tr>
                    <td colspan="5">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($properties as $property)

                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $property->address }}</td>
                    <td>{{ strtoupper($property->cadastral_number) }}</td>
                    <td>{{ ucfirst(str_replace("_", " ", $property->status)) }}</td>
                    <td>{{ $property->owner->name }}</td>
                    <td>{{ $property->owner->phone }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.tasks.create', ['unit' => $property->id]) }}">
                            Select
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endif

@endsection
