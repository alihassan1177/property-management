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
    @if (request('property_id') == null)
    <h3 class="h5">Select Property</h3>
    <ul>
        @foreach ($properties as $property)
            <li>
                <a href="{{ route('admin.accounting.rent-invoices.create', ["property_id" => $property->id]) }}">
                    {{ $property?->country?->flag . " " . $property?->country?->name }} : {{ $property->cadastral_number }} : {{ $property->address }}
                </a>
            </li>
        @endforeach
    </ul>
    @else
    <form method="POST" action="{{ route('admin.accounting.rent-invoices.store') }}">
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

            <input type="hidden" name="property_id" value="{{ $selected_property->id }}">
            <input type="hidden" name="tenant_id" value="{{ $selected_property->tenant->id }}">

            <div class="col-12">

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