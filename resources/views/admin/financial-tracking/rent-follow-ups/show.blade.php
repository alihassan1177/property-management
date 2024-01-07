@extends('layouts.admin.master')

@section('title', 'Rent Follow Up Details')

@section('content')

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Rent Follow Up Details</h3>
    </div>  
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <div class="row g-3">

        <div class="col-md-6">

            <div class="mb-3">
                <p class="m-0"><strong>Follow Up Notes:</strong></p>
                <p>{{ $rent_follow_up->notes }}</p>
            </div>

        </div>

        <div class="col-md-6">

            <div class="mb-3">
                <p class="m-0"><strong>Invoice NO:</strong></p>
                <p>{{ $rent_follow_up->invoice->invoice_no }}</p>
            </div>

        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Issue Date:</strong></p>
                <p>{{ \Carbon\Carbon::parse($rent_follow_up->invoice->issue_date)->isoFormat('LL') }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Due Date:</strong></p>
                <p>{{ \Carbon\Carbon::parse($rent_follow_up->invoice->due_date)->isoFormat('LL') }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Status:</strong></p>
                <p>{{ $rent_follow_up->invoice->formatted_status }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>TAX Percentage:</strong></p>
                <p>{{ $rent_follow_up->invoice->tax_percentage."%" }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Amount without TAX:</strong></p>
                <p>{{ $rent_follow_up->invoice->total_amount }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Amount with TAX:</strong></p>
                <p>{{ $rent_follow_up->invoice->taxed_amount }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Due Amount:</strong></p>
                <p>{{ $rent_follow_up->invoice->due_amount }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Paid Amount:</strong></p>
                <p>{{ $rent_follow_up->invoice->paid_amount ? $rent_follow_up->invoice->paid_amount : 0 }}</p>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <p class="m-0"><strong>Invoice Information:</strong></p>
                <p>{{ $rent_follow_up->invoice->notes }}</p>
            </div>
        </div>


        @if (isset($rent_follow_up->invoice->property) && $rent_follow_up->invoice->property)
        <div class="col-12"><hr class="my-5"></div>

        <h3 class="h5">Property Information</h3>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Cadastral Number:</strong></p>
                <p>{{ $rent_follow_up->invoice->property->cadastral_number }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Address:</strong></p>
                <p>{{ $rent_follow_up->invoice->property->address }}</p>
            </div>
        </div>

        @if (isset($rent_follow_up->invoice->property->country) && $rent_follow_up->invoice->property->country)            
        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Country:</strong></p>
                <p>{{ $rent_follow_up->invoice->property->country->name }}</p>
            </div>
        </div>
        @endif

        @if (isset($rent_follow_up->invoice->property->tenant) && $rent_follow_up->invoice->property->tenant)            

        <div class="col-12"><hr class="my-5"></div>

        <h3 class="h5">Tenant Information</h3>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Name:</strong></p>
                <p>{{ $rent_follow_up->invoice->property->tenant->name }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Email:</strong></p>
                <p>{{ $rent_follow_up->invoice->property->tenant->email }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Phone:</strong></p>
                <p>{{ $rent_follow_up->invoice->property->tenant->phone }}</p>
            </div>
        </div>
        @endif

        @endif

    </div>

</div>

@endsection