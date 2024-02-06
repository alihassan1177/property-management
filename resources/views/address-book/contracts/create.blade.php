@extends('layouts.admin.master')

@section('title', 'Add New Contract')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Contract</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.contracts.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Contract Form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Contract
                </button>
            </div>
        </div>
    
        <div class="row g-3">
            
            <div class="col-md-6">
                <label for="property" class="form-label">Property <span class="text-danger">*</span></label>
                <select style="width: 100%" class="form-control" name="property_id" id="property_select">
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->cadastral_number . " " . $property->address }}</option>
                    @endforeach
                </select>
                @error('property_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="property" class="form-label">Tenant <span class="text-danger">*</span></label>
                <select style="width: 100%" class="form-control" name="tenant_id" id="tenant_select">
                    @foreach ($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->name . " : " . $tenant->email }}</option>
                    @endforeach
                </select>
                @error('tenant_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label for="document" class="form-label">Document <span class="text-danger">*</span></label>
                <input type="file" value="{{ old('document') }}" class="form-control" placeholder="Enter tenant Document" name="document" id="document">
                @error('document')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="col-12">
                <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                <input type="date" value="{{ old('start_date') }}" class="form-control" placeholder="Enter tenant Start Date" name="start_date" id="start_date">
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
                <input type="date" value="{{ old('end_date') }}" class="form-control" placeholder="Enter tenant Start Date" name="end_date" id="end_date">
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label for="late_fee_amount" class="form-label">Late fee charges <span class="text-danger">*</span></label>
                <input type="number" value="{{ old('late_fee_amount') }}" class="form-control" placeholder="Enter tenant late fee charges" name="late_fee_amount" id="late_fee_amount">
                @error('late_fee_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="col-12">
                <label for="early_termination_fee_amount" class="form-label">Early termination fee <span class="text-danger">*</span></label>
                <input type="number" value="{{ old('early_termination_fee_amount') }}" class="form-control" placeholder="Enter tenant early termination fee" name="early_termination_fee_amount" id="early_termination_fee_amount">
                @error('early_termination_fee_amount')
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
        $('#property_select').select2({
            width : 'style'
        })

        $('#tenant_select').select2({
            width : 'style'
        })
    })
</script>

@endsection