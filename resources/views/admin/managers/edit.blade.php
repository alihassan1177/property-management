@extends('layouts.admin.master')

@section('title', 'Edit manager Info')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Edit manager Info</h3>
    </div>
</div>


<div class="bg-white shadow-sm p-4 rounded">

    <form action="{{ route('admin.managers.update', $manager->id) }}" class="row g-3" method="post">
        @csrf
    
        <div class="col-12">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('name', $manager->name) }}" class="form-control" placeholder="Enter manager name" name="name" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" value="{{ old('email', $manager->email) }}" class="form-control" placeholder="Enter manager email" disabled readonly id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" value="{{ old('phone', $manager->phone) }}" class="form-control" placeholder="Enter manager phone" disabled readonly id="phone">
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