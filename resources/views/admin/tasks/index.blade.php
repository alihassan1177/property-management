@extends('layouts.admin.master')

@section('title', 'Task Management')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Task Management</h3>
    </div>
</div>

<div class="bg-light p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Task</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">
                Add new Task
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Assignee</th>
                    <th scope="col">Assigned Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Task Description</th>
                </tr>
            </thead>
            <tbody>
                @if (!$tasks->count())
                <tr>
                    <td colspan="5">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($tasks as $task)
                @php
                $row = ($tasks ->currentpage() - 1) * $tasks ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>

                    <td>{{ $task->assignee }}</td>

                    <td>{{ \Carbon\Carbon::parse($task->created_at)->isoFormat('ll') }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->due_date)->isoFormat('ll') }}</td>

                    <td>
                        {{ Str::limit($task->task_description, 60, "...") }}
                    </td>

                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.tasks.show', $task->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.tasks.edit', $task->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>

                                <li>
                                    <form class="dropdown-item" action="{{ route('admin.tasks.delete', $task->id) }}" method="POST"
                                        onclick="return confirm('{{ __('Are you sure you want to delete this. This cannot be undone?') }}')">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit">
                                        Delete
                                    </button>
                                  </form>
                                </li>
                            </ul>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="float-end">
        {{ $tasks->links() }}
    </div>

</div>

@endsection