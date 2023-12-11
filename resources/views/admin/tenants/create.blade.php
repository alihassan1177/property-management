@extends('layouts.admin.master')

@section('title', 'Add new Tenant')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add new Tenant</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    
    @if (!isset($property))
    <ul>
    @foreach ($units as $property)
        <li>
            <a href="{{ route('admin.tenants.create', ['property_id' => $property->id]) }}">
                {{ $property->id . ". ".$property->cadastral_number . " : " . $property->address }}
            </a>
        </li>
    @endforeach    
    </ul>
    @else
    <form action="{{ route('admin.tenants.store') }}" class="row g-3" method="post">
        @csrf

        <input type="text" value="{{ $property->id }}" name="property_id" hidden>
    
        <div class="col-12">
            <h5>Tenant Info</h5>
        </div>
        
        <div class="col-12">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('name') }}" class="form-control" placeholder="Enter tenant name" name="name" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Enter tenant email" name="email" id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('phone') }}" class="form-control" placeholder="Enter tenant phone" name="phone" id="phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('address') }}" class="form-control" placeholder="Enter tenant address" name="address" id="address">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <hr>
        </div>

        <div class="col-12">
            <h5>Contract Info</h5>
        </div>

        <div class="col-12">
            <label for="late_fee_charges" class="form-label">Late fee charges <span class="text-danger">*</span></label>
            <input type="number" value="{{ old('late_fee_charges') }}" class="form-control" placeholder="Enter tenant late fee charges" name="late_fee_charges" id="late_fee_charges">
            @error('late_fee_charges')
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

        @if (isset($property))            
        <div class="col-12">
            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Rent Amount: {{ $property->rent_amount }}$</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Security Deposit: {{ $property->security_deposit }}$</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Rental Period: {{ $property->rental_period }} months</p>
                </div>
            </div>
        </div>
        @endif

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
    @endif

</div>

@endsection