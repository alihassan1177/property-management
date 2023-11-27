@extends('layouts.admin.master')

@section('title', 'Add new owner')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add new Owner</h3>
    </div>
</div>


<div class="bg-light p-4 rounded">

    <form action="{{ route('admin.owners.store') }}" class="row g-3" method="post">
        @csrf
        
        <div class="col-12">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('name') }}" class="form-control" placeholder="Enter owner name" name="name" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Enter owner email" name="email" id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('phone') }}" class="form-control" placeholder="Enter owner phone" name="phone" id="phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>

@endsection