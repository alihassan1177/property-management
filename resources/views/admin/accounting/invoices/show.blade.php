@extends('layouts.admin.master')

@section('title', 'Invoice Category Details')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Invoice Category Details</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <div class="row g-5">

        <div class="col-12">

            <div class="mb-3">
                <p class="m-0"><strong>Name:</strong></p>
                <p>{{ $invoice_category->name }}</p>
            </div>

            <hr class="my-5">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Customer</th>
                            <th>Category</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Due Amount</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$invoice_category->invoices->count())
                        <tr>
                            <td colspan="10">
                                <p class="text-center m-0 py-3">No results found</p>
                            </td>
                        </tr>
                        @endif
        
                        @foreach ($invoice_category->invoices as $invoice)
                        <tr>
                            <td>#{{ $invoice->invoice_no }}</td>
                            <td>{{ $invoice->user->name }}</td>
                            <td>{{ $invoice->invoice_category->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice_category->issue_date)->isoFormat('LL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice_category->due_date)->isoFormat('LL') }}</td>
                            <td>{{ $invoice->due_amount }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td>{{ $invoice->formatted_status }}</td>
                            {{-- <td>
                                <a href="{{ route('income.invoice.view', $invoice->id) }}"><i class="ik ik-eye f-16 mr-15 text-primary"></i></a>
                                <a href="{{ route('income.invoice.edit', $invoice->id) }}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                            </td> --}}
                        </tr>
                        @endforeach
        
        
                    </tbody>
                </table>
            </div>

        </div>



    </div>

</div>

@endsection