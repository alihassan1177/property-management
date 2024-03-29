@extends('layouts.admin.master')

@section('title', 'Add New Key Date')

@section('content')


<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Email Reminder</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <form method="POST" action="{{ route('admin.email-reminders.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Email Reminder form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Email Reminder
                </button>
            </div>
        </div>

        <div class="row g-3">

            <div class="col-12">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" placeholder="Enter reminder name" type="text" name="name" value="{{ old('name') }}" id="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="email-select">Recipient</label>
                <select style="width: 100%" name="email" id="email-select">
                    @foreach ($managers as $manager)
                        <option value="{{ $manager->email }}">{{ $manager->email }} -- Manager</option>
                    @endforeach
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->email }}">{{ $owner->email }} -- Owner</option>
                    @endforeach
                    @foreach ($tenants as $tenant)
                    <option value="{{ $tenant->email }}">{{ $tenant->email }} -- Tenant</option>
                    @endforeach
                </select>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="date">Reminder Date</label>
                <input class="form-control" placeholder="Select Date" type="date" name="date" value="{{ old('date') }}" id="date">
                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="time">Reminder Time</label>
                <input class="form-control" placeholder="Select the time on which recipient should receive the reminder" type="time" name="time" value="{{ old('time') }}" id="time">
                @error('time')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="email">Message</label>
                <textarea class="form-control" placeholder="Enter message" name="message" id="" cols="30" rows="10">{{ old('message') }}</textarea>
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