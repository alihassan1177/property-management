@extends('layouts.admin.master')

@section('title', 'Edit Invoice Category')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Edit Invoice Category</h3>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-sm">
    <form method="POST" action="{{ route('admin.accounting.invoice-categories.update', $invoice_category->id) }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Entry form</h4>
            <div>
                <button class="btn btn-primary">
                    Update Entry
                </button>
            </div>
        </div>
    
        <div class="row g-5">
    
            <div class="col-12">
    
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <input value="{{ old('name', $invoice_category->name) }}" placeholder="Enter your category name" type="text" id="name" name="name" class="form-control">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

         
            </div>
    
    
        </div>
    
    </form>

</div>

@endsection
