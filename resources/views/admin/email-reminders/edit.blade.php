@extends('layouts.admin.master')

@section('title', 'Update Email Reminder')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Edit Email Reminder</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <form method="POST" action="{{ route('admin.email-reminders.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Email Reminder form</h4>
            <div>
                <button class="btn btn-primary">
                    Update Email Reminder
                </button>
            </div>
        </div>

        <div class="row g-3">

            <div class="col-12">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" placeholder="Enter reminder name" type="text" name="name" value="{{ old('name', $email_reminder->name) }}" id="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="email-select">Recipient</label>
                <select style="width: 100%" name="email" id="email-select">
                    @foreach ($managers as $manager)
                        <option @selected($manager->email == old('email', $email_reminder->email)) value="{{ $manager->email }}">{{ $manager->email }} -- Manager</option>
                    @endforeach
                    @foreach ($owners as $owner)
                        <option @selected($owner->email == old('email', $email_reminder->email)) value="{{ $owner->email }}">{{ $owner->email }} -- Owner</option>
                    @endforeach
                    @foreach ($tenants as $tenant)
                    <option @selected($tenant->email == old('email', $email_reminder->email))  value="{{ $tenant->email }}">{{ $tenant->email }} -- Tenant</option>
                    @endforeach
                </select>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="date">Reminder Date</label>
                <input class="form-control" placeholder="Select Date" type="date" name="date" value="{{ \Carbon\Carbon::parse(old('date', $email_reminder->reminder_date))->format('Y-m-d') }}" id="date">
                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="time">Reminder Time</label>
                <input class="form-control" placeholder="Select the time on which recipient should receive the reminder" type="time" name="time" value="{{ \Carbon\Carbon::parse(old('date', $email_reminder->reminder_date))->format('H:i') }}" id="time">
                @error('time')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="email">Message</label>
                <textarea class="form-control" placeholder="Enter message" name="message" id="" cols="30" rows="10">{{ old('message', $email_reminder->message) }}</textarea>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



        </div>


    </form>

</div>

@endsection

@section('scripts')

<script>
    $(function() {
        $('#email-select').select2({
            width : 'style'
        })
    })
</script>

@endsection