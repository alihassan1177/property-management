@extends('layouts.admin.master')

@section('title', 'Add New Rent Follow Up')

@section('styles')

<style>
    .form-group{
        margin-bottom: 20px
    }
    .form-group label {
        margin-bottom: 5px
    }
</style>

@endsection

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Rent Follow Up</h3>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-sm">

    @if (request('property_id') == null)
    <h3 class="h5 ">Select Property</h3>
    <ul>
        @foreach ($units as $property)
            <li>
                <a href="{{ route('admin.financial-tracking.charge-settlements.create', ['property_id' => $property->id]) }}">
                    {{ $loop->iteration }} . {{ $property->cadastral_number }} : {{ $property->address }}
                </a>
            </li>
        @endforeach
    </ul>    
    @else
    <form method="POST" action="{{ route('admin.financial-tracking.rent-follow-ups.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Entry form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Entry
                </button>
            </div>
        </div>
    
        <div class="row g-5">
    
            <div class="col-12">
    
                <div class="form-group">
                    <label>Rent Invoices</label>

                    <select name="invoice_id" id="property_select" style="width: 100%">
                        <option selected="selected" value="">Select Invoice</option>
                        @foreach ($rent_invoices as $invoice)
                            <option value="{{ $invoice->id }}">{{ $invoice->invoice_no }} : {{ $invoice->property->cadastral_number }} : {{ $invoice->property->address }}</option>
                        @endforeach
                    </select>

                    @error('invoice_id')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Follow Up Details</label>
                    <textarea class="form-control" style="min-height: 200px" name="notes" placeholder="Enter Invoice Details"></textarea>
                    @error('notes')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
         
            </div>
    
    
        </div>
    
    </form>
    @endif


</div>

@endsection

@section('scripts')
<script>
    $(function() {
        $("#property_select").select2({
            width : "style"
        })
    })
</script>
@endsection