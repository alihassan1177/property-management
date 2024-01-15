@extends('layouts.admin.master')

@section('title', 'Email Reminder Details')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Email Reminder Details</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <div class="row g-5">

        <div class="col-12">

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0"><b>Name:</b> {{ $email_reminder->name }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0"><b>Reminder Sent:</b> {{ strtoupper($email_reminder->reminder_sent) }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0"><b>Recipient:</b> {{ $email_reminder->email }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0"><b>Reminder Date:</b> {{ \Carbon\Carbon::parse($email_reminder->reminder_date)->isoFormat('LLL') }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0"><b>Message:</b> {{ $email_reminder->message }}</p>
                </div>
            </div>


        </div>


    </div>

</div>

@endsection