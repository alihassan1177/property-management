{{-- @dd($property->toArray()) --}}

@extends('layouts.admin.master')

@section('title', 'Key Date Details')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Key Date Details</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">

    <div class="row g-5">

        <div class="col-12">
            <h5 class="text-uppercase text-primary">
                Key Date information
            </h5>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Key Date: {{ $keydate->key_date }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Reminder Date: {{ $keydate->reminder_date }}</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex gap-4 align-items-center justify-content-between">
                    <p class="m-0">Propert Cadastral Number: {{ $keydate->property->cadastral_number }}</p>
                </div>
            </div>

            <hr class="my-5">

            <h5 class="text-uppercase text-primary">
                Key Date Description
            </h5>

            <p>
                {{ $keydate->key_date_description }}
            </p>

        </div>


    </div>

</div>

@endsection