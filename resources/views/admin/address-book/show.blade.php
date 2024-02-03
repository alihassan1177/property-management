@extends('layouts.admin.master')

@section('title', 'Address Book Entry Details')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Address Book Entry Details</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <div class="row g-5">

        <div class="col-lg-6">
            <h5 class="text-uppercase text-primary">
                Entry information
            </h5>

            <div class="mb-3">
                <p class="m-0"><strong>Visit Date:</strong></p>
                <p>{{ \Carbon\Carbon::parse($entry->created_at)->isoFormat('ll') }}</p>
            </div>

            <div class="mb-3">
                <p class="m-0"><strong>Name:</strong></p>
                <p>{{ $entry->name }}</p>
            </div>

            <div class="mb-3">
                <p class="m-0"><strong>Email:</strong></p>
                {{ $entry->email }}
            </div>

            <div class="mb-3">
                <p class="m-0"><strong>Phone:</strong></p>
                {{ $entry->phone }}
            </div>

            <div class="mb-3">
                <p class="m-0"><strong>Address:</strong></p>
                <p>{{ $entry->address }}</p>
            </div>


        </div>



    </div>

</div>

@endsection