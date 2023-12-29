@extends('layouts.admin.master')

@section('title', 'Edit Owner Info')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Edit Owner Info</h3>
    </div>
</div>


<div class="bg-white shadow-sm p-4 rounded">

    <form action="{{ route('admin.owners.update', $owner->id) }}" class="row g-3" method="post">
        @csrf
    
        <div class="col-12">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('name', $owner->name) }}" class="form-control" placeholder="Enter owner name" name="name" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" value="{{ old('email', $owner->email) }}" class="form-control" placeholder="Enter owner email" disabled readonly id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('phone', $owner->phone) }}" class="form-control" placeholder="Enter owner phone" disabled readonly id="phone">
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