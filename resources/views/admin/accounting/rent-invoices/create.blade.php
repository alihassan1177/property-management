@extends('layouts.admin.master')

@section('title', 'Add New Invoice')

@section('styles')

<style>
    .form-group {
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
        <h3>Add New Invoice</h3>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-sm">
    <form method="POST" action="{{ route('admin.accounting.invoices.store') }}">
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
                    <label>Property</label>

                    <select name="property_id" id="property_select" style="width: 100%">
                        <option selected="selected" value="">Select Property</option>
                        @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property?->country?->flag . " " .
                            $property?->country?->name }} : {{ $property->cadastral_number }} : {{ $property->address }}
                        </option>
                        @endforeach
                    </select>

                    @error('property_id')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Issue Date</label>
                            <input type="date" name="issue_date" class="form-control" placeholder="Select Date">
                            @error('issue_date')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="date" name="due_date" class="form-control" placeholder="Select Date">
                            @error('due_date')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Category</label>

                    <select name="invoice_category_id" id="category_select" style="width: 100%">
                        <option value="">Select Category</option>
                        @foreach ($invoice_categories as $invoice_category)
                        <option value="{{ $invoice_category->id }}">{{ $invoice_category->name }}</option>
                        @endforeach
                    </select>
                    @error('invoice_category_id')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" name="total_amount" class="form-control">
                    @error('total_amount')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tax Percentage</label>
                    <input type="number" name="tax_percentage" class="form-control">
                    @error('tax_percentage')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Invoice Details</label>
                    <textarea class="form-control" style="min-height: 200px" name="notes"
                        placeholder="Enter Invoice Details"></textarea>
                    @error('notes')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

            </div>


        </div>

    </form>

</div>

@endsection

@section('scripts')
<script>
    $(function() {
        $("#property_select").select2({
            width : "style"
        })
        $("#category_select").select2({
            width : "style"
        })
    })
</script>
@endsection