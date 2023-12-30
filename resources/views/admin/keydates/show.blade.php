{{-- @dd($property->toArray()) --}}

@extends('layouts.admin.master')

@section('title', 'Unit Details')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Unit Details</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <div class="row g-5">

        <div class="col-lg-6">
            <h5 class="text-uppercase text-primary">
                unit information
            </h5>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Address: {{ $property->address }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Cadastral Number: {{ strtoupper($property->cadastral_number) }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Total Area: {{ $property->total_area }}sqft</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between mb-3">
                    <p class="m-0">Living Area: {{ $property->living_area }}sqft</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Floors: {{ $property->floors }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Bedrooms: {{ $property->number_of_beds }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between mb-3">
                    <p class="m-0">Bathrooms: {{ $property->number_of_baths }}</p>
                </div>
            </div>

            <hr class="my-5">

            <h5 class="text-uppercase text-primary">
                Owner information
            </h5>
            <p>Name : {{ $property->owner->name }}</p>
            <p>Email : {{ $property->owner->email }}</p>
            <p>Phone : {{ $property->owner->phone }}</p>

            
            @if (!is_null($property->tenant))
            <hr class="my-5">
            <div class="col-lg-6">
                <h5 class="text-uppercase text-primary">
                    Tenant information
                </h5>
                <p>Name : {{ $property->tenant->name }}</p>
                <p>Email : {{ $property->tenant->email }}</p>
                <p>Phone : {{ $property->tenant->phone }}</p>
            </div>
            @endif

            @if (!is_null($property->manager))
            <hr class="my-5">
            <div class="col-lg-6">
                <h5 class="text-uppercase text-primary">
                    Manager information
                </h5>
                <p>Name : {{ $property->manager->name }}</p>
                <p>Email : {{ $property->manager->email }}</p>
                <p>Phone : {{ $property->manager->phone }}</p>
            </div>
            @endif
    

        </div>

        <div class="col-lg-6">
            <h5 class="text-uppercase text-primary">
                Rental Details
            </h5>

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

            <hr class="my-5">

            <h5 class="text-uppercase text-primary">
                Energy Performance Certificate
            </h5>

            @if (isset($property->energy_performance_certificate))
                <a class="btn btn-dark" target="_blank" href="{{ asset('uploads/' . $property->energy_performance_certificate) }}">
                    <i class="fa fa-file"></i> {{ Str::limit($property->energy_performance_certificate, 40, "...") }}
                </a>
            @endif

            <hr class="my-5">

            <h5 class="text-uppercase text-primary">
                Electricity Information
            </h5>   
            <p>Info : {{ unserialize($property->electricity_information)["info"] ?? "" }}</p>
            <p>Price : {{ unserialize($property->electricity_information)["price"]."$"  ?? ""}}</p>

            <hr class="my-5">
            <h5 class="text-uppercase text-primary">
                Gas Information
            </h5>   
            <p>Info : {{ unserialize($property->gas_information)["info"] ?? "" }}</p>
            <p>Price : {{ unserialize($property->gas_information)["price"]."$"  ?? ""}}</p>
            
            <hr class="my-5">
            <h5 class="text-uppercase text-primary">
                Internet Information
            </h5>   
            <p>Info : {{ unserialize($property->internet_information)["info"] ?? "" }}</p>
            <p>Price : {{ unserialize($property->internet_information)["price"]."$"  ?? ""}}</p>
            
            <hr class="my-5">
            <h5 class="text-uppercase text-primary">
                Water Information
            </h5>   
            <p>Info : {{ unserialize($property->water_information)["info"] ?? "" }}</p>
            <p>Price : {{ unserialize($property->water_information)["price"]."$"  ?? ""}}</p>
            

        </div>


    </div>

</div>

@endsection