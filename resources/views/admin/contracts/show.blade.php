@extends('layouts.admin.master')

@section('title', 'Contract Information')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Contract Information</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <h5 class="text-uppercase text-primary">
        Contract Details
    </h5>

    @if (isset($contract->document) && $contract->document)        
    <div class="mb-3">
        <div>
            <p class="m-0">Document: </p>
            <a target="_blank" class="btn btn-dark" href="{{ asset('uploads/' . $contract->document) }}">
                {{ $contract->document }}
            </a>
        </div>
    </div>
    @endif

    @if (isset($contract->gas_information) && $contract->gas_information)        
    <div class="mb-3">
        <div>
            <p class="m-0">Gas Information: {{ unserialize($contract->gas_information)["info"] ?? "" }} </p>
            <p class="m-0">Gas Price: {{ unserialize($contract->gas_information)["price"] ?? "" }} </p>
        </div>
    </div>
    @endif

    @if (isset($contract->internet_information) && $contract->internet_information)        
    <div class="mb-3">
        <div>
            <p class="m-0">Internet Information: {{ unserialize($contract->internet_information)["info"] ?? "" }} </p>
            <p class="m-0">Internet Price: {{ unserialize($contract->internet_information)["price"] ?? "" }} </p>
        </div>
    </div>
    @endif

    @if (isset($contract->water_information) && $contract->water_information)        
    <div class="mb-3">
        <div>
            <p class="m-0">Water Information: {{ unserialize($contract->water_information)["info"] ?? "" }} </p>
            <p class="m-0">Water Price: {{ unserialize($contract->water_information)["price"] ?? "" }} </p>
        </div>
    </div>
    @endif

    @if (isset($contract->electricity_information) && $contract->electricity_information)        
    <div class="mb-3">
        <div>
            <p class="m-0">Electricity Information: {{ unserialize($contract->electricity_information)["info"] ?? "" }} </p>
            <p class="m-0">Electricity Price: {{ unserialize($contract->electricity_information)["price"] ?? "" }} </p>
        </div>
    </div>
    @endif
    
    <hr class="my-5">

    <h5 class="text-uppercase text-primary">
        Property Information
    </h5>

    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Address: {{ $contract->property->address }}</p>
        </div>
    </div>
    
    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Cadastral Number: {{ $contract->property->cadastral_number }}</p>
        </div>
    </div>
    
    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">
                <a target="_blank" href="{{ route('admin.units.show', $contract->property->id) }}">
                    More Details Here
                </a>
            </p>
        </div>
    </div>
    
    <hr class="my-5">
   
    <h5 class="text-uppercase text-primary">
        Tenant Information
    </h5>

    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Name: {{ $contract->tenant->name }}</p>
        </div>
    </div>

    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Phone: {{ $contract->tenant->phone }}</p>
        </div>
    </div>

    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Email: {{ $contract->tenant->email }}</p>
        </div>
    </div>
   
    <hr class="my-5">

    <h5 class="text-uppercase text-primary">
        Owner Information
    </h5>

    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Name: {{ $contract->property->owner->name }}</p>
        </div>
    </div>

    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Phone: {{ $contract->property->owner->phone }}</p>
        </div>
    </div>

    <div class="mb-3">
        <div class="d-flex gap-4 align-items-center justify-content-between">
            <p class="m-0">Email: {{ $contract->property->owner->email }}</p>
        </div>
    </div>

</div>

@endsection