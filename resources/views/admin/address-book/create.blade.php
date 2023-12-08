@extends('layouts.admin.master')

@section('title', 'Add New Address Book Entry')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Address Book Entry</h3>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-sm">
    <form method="POST" action="{{ route('admin.address-book.store') }}">
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
    
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label" for="name">Name: <span style="font-size: 12px" class="text-secondary">Use comma as separator for multiple values (name1, name2)</span></label>
                        <input value="{{ old('name') }}" placeholder="Enter your name" type="text" id="name" name="name" class="form-control">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label" for="email">Email: <span style="font-size: 12px" class="text-secondary">Use comma as separator for multiple values (email1, email2)</span></label>
                        <textarea placeholder="Enter your email address" class="form-control" name="email" id="email" cols="30" rows="5">{{ old('email') }}</textarea>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone: <span style="font-size: 12px;" class="text-secondary">Use comma as separator for multiple values (phone1, phone2)</span></label>
                        <textarea placeholder="Enter your phone" class="form-control" name="phone" id="phone" cols="30" rows="5">{{ old('phone') }}</textarea>
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label" for="address">Address:</label>
                        <textarea placeholder="Enter your address" class="form-control" name="address" id="address" cols="30" rows="5">{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
            </div>
    
    
        </div>
    
    </form>

</div>

@endsection

