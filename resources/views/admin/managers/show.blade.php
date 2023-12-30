@extends('layouts.admin.master')

@section('title', 'manager Information')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>manager Information</h3>
    </div>
</div>


<div class="bg-white shadow-sm p-4 rounded">

    <div class="row">
        <div class="col-lg-6">
            <h5 class="text-uppercase text-primary">
                manager Info
            </h5>
            <p>Name : {{ $manager->name }}</p>
            <p>Email : {{ $manager->email }}</p>
            <p>Phone : {{ $manager->phone }}</p>
        </div>
    </div>

    <div class="mb-5"></div>

    <h5 class="text-uppercase text-primary">
        manager property info
    </h5>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address</th>
                    <th scope="col">Cadastral Number</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                @if (!$manager->property->count())
                    <tr>
                        <td colspan="4">
                            <p class="text-center">No results found</p>
                        </td>
                    </tr>
                @endif

                @foreach ($manager->property as $property)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $property->address }}
                        </td>
                        <td>
                            {{ $property->cadastral_number }}
                        </td>
                        <td>
                            {{ $property->status }}
                        </td>
                    </tr>
                @endforeach
            

            </tbody>
        </table>
    </div>

</div>


@endsection