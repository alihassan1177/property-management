@extends('layouts.admin.master')

@section('title', 'Unit Management')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Units Management</h3>
    </div>
</div>

<div class="bg-light p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Units</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.units.create') }}" class="btn btn-primary">
                Add new Unit
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address</th>
                    <th scope="col">Cadastral Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Owner Phone</th>
                </tr>
            </thead>
            <tbody>
                @if (!$units->count())
                <tr>
                    <td colspan="5">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($units as $property)

                @php
                $row = ($units ->currentpage() - 1) * $units ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->cadastral_number }}</td>
                    <td>{{ ucfirst(str_replace("_", " ", $property->status)) }}</td>
                    <td>{{ $property->owner->name }}</td>
                    <td>{{ $property->owner->phone }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="float-end">
        {{ $units->links() }}
    </div>

</div>

@endsection