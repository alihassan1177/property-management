@extends('layouts.admin.master')

@section('title', 'Accounting Management')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Accounting Management</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">Vat Management</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.accounting.vat-management.create') }}" class="btn btn-primary">
                Add new Entry
            </a>
        </div>
    </div>

</div>

@endsection