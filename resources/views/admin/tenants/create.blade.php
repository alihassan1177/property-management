@extends('layouts.admin.master')

@section('title', 'Add new Tenant')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add new Tenant</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <form action="{{ route('admin.tenants.store') }}" class="row g-3" method="post">
        @csrf
        
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
            <label for="property_id" class="form-label">Property <span class="text-danger">*</span></label>
            <select style="width: 100%" name="property_id" id="property_id">
                @foreach ($units as $property)
                    <option value="{{ $property->id }}">{{ $property->cadastral_number . " : " . $property->address }}</option>
                @endforeach
            </select>
            @error('property_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>

@endsection

@section('scripts')

<script>
    $(function(){
        $("#property_id").select2({
            width : "style"
        })
    })
</script>

@endsection