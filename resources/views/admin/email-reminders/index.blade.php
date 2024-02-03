@extends('layouts.admin.master')

@section('title', 'Email Reminders Management')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Email Reminders Management</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Email Reminders</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.email-reminders.create') }}" class="btn btn-primary">
                Add new Email Reminder
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sent</th>
                    <th scope="col">Date</th>
                    <th scope="col">Message</th>
                    <th scope="col">Recipient</th>
                </tr>
            </thead>
            <tbody>
                @if (!$email_reminders->count())
                <tr>
                    <td colspan="6">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($email_reminders as $email_reminder)

                @php
                $row = ($email_reminders ->currentpage() - 1) * $email_reminders ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <th scope="row">{{ $email_reminder->name }}</th>
                    <th scope="row">{{ strtoupper($email_reminder->reminder_sent) }}</th>
                    <th scope="row">{{ \Carbon\Carbon::parse($email_reminder->reminder_date)->isoFormat('LLL') }}</th>
                    <th scope="row">{{ Str::limit($email_reminder->message, 50, "...") }}</th>
                    <th scope="row">{{ $email_reminder->email }}</th>
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.email-reminders.show', $email_reminder->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.email-reminders.edit', $email_reminder->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>

                                <li>
                                    <form class="dropdown-item" action="{{ route('admin.email-reminders.destroy', $email_reminder->id) }}" method="POST"
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
        {{ $email_reminders->links() }}
    </div>

</div>

@endsection