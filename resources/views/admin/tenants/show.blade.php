@extends('layouts.admin.master')

@section('title', 'Tenant Information')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Tenant Information</h3>
    </div>
</div>


<div class="bg-white shadow-sm p-4 rounded">

    <h5 class="text-uppercase text-primary">
        tenant Info
    </h5>
    <p><strong>Name</strong>  : {{ $tenant->name }}</p>
    <p><strong>Email</strong> : {{ $tenant->email }}</p>
    <p><strong>Phone</strong>  : {{ $tenant->phone }}</p>

    <div class="mb-5"></div>

    <h5 class="text-uppercase text-primary">
        tenant property info
    </h5>
    <p><strong>Address</strong>  : {{ $tenant->property->address }}</p>
    <p><strong>Cadastral Number</strong> : {{ $tenant->property->cadastral_number }}</p>
    <p><a target="_blank" href="{{ route('admin.units.show', $tenant->property->id) }}">More info about property</a></p>

</div>


@endsection