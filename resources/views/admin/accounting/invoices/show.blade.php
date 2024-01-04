@extends('layouts.admin.master')

@section('title', 'Invoice Details')

@section('content')

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Invoice Details</h3>

        @if ($invoice->due_amount)
        <button data-bs-toggle="modal" data-bs-target="#addPayment" class="btn btn-primary btn-sm">Add Payment</button>
        @endif

    </div>
</div>

<div class="modal fade" id="addPayment" tabindex="-1" aria-labelledby="addPaymentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addPaymentLabel">Add Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.accounting.invoices.add-payment', $invoice->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <p><strong>Total Amount with Tax:</strong> {{ $invoice->taxed_amount }}</p>
                    <p><strong>Due Amount:</strong> {{ $invoice->due_amount }}</p>

                    <input placeholder="Enter payment amount" value="{{ old('paid_amount') }}" type="number" name="paid_amount" class="form-control">
                    @error('paid_amount')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <div class="row g-3">

        <div class="col-md-6">

            <div class="mb-3">
                <p class="m-0"><strong>Invoice NO:</strong></p>
                <p>{{ $invoice->invoice_no }}</p>
            </div>

        </div>

        @if (isset($invoice->invoice_category) && $invoice->invoice_category)            
        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Invoice Category:</strong></p>
                <p>{{ $invoice->invoice_category->name }}</p>
            </div>
        </div>
        @endif

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Issue Date:</strong></p>
                <p>{{ \Carbon\Carbon::parse($invoice->issue_date)->isoFormat('LL') }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Due Date:</strong></p>
                <p>{{ \Carbon\Carbon::parse($invoice->due_date)->isoFormat('LL') }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Status:</strong></p>
                <p>{{ $invoice->formatted_status }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>TAX Percentage:</strong></p>
                <p>{{ $invoice->tax_percentage."%" }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Amount without TAX:</strong></p>
                <p>{{ $invoice->total_amount }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Amount with TAX:</strong></p>
                <p>{{ $invoice->taxed_amount }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Due Amount:</strong></p>
                <p>{{ $invoice->due_amount }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Paid Amount:</strong></p>
                <p>{{ $invoice->paid_amount ? $invoice->paid_amount : 0 }}</p>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <p class="m-0"><strong>Invoice Information:</strong></p>
                <p>{{ $invoice->notes }}</p>
            </div>
        </div>


        @if (isset($invoice->property) && $invoice->property)
        <div class="col-12"><hr class="my-5"></div>

        <h3 class="h5">Property Information</h3>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Cadastral Number:</strong></p>
                <p>{{ $invoice->property->cadastral_number }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Address:</strong></p>
                <p>{{ $invoice->property->address }}</p>
            </div>
        </div>

        @if (isset($invoice->property->country) && $invoice->property->country)            
        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Country:</strong></p>
                <p>{{ $invoice->property->country->name }}</p>
            </div>
        </div>
        @endif

        @if (isset($invoice->property->tenant) && $invoice->property->tenant)            

        <div class="col-12"><hr class="my-5"></div>

        <h3 class="h5">Tenant Information</h3>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Name:</strong></p>
                <p>{{ $invoice->property->tenant->name }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Email:</strong></p>
                <p>{{ $invoice->property->tenant->email }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <p class="m-0"><strong>Phone:</strong></p>
                <p>{{ $invoice->property->tenant->phone }}</p>
            </div>
        </div>
        @endif

        @endif

    </div>

</div>

@endsection