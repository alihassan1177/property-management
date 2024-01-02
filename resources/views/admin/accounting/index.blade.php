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

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country</th>
                    <th scope="col">Vat Rate</th>
                </tr>
            </thead>
            <tbody>
                @if (!$vat_rates->count())
                <tr>
                    <td colspan="4">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($vat_rates as $vat_rate)

                @php
                $row = ($vat_rates ->currentpage() - 1) * $vat_rates ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $vat_rate->country->name }}</td>
                    <td>{{ $vat_rate->vat_rates."%" }}</td>
                   
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.accounting.vat-management.edit', $vat_rate->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <div class="float-end">
        {{ $vat_rates->links() }}
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

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country</th>
                    <th scope="col">Vat Rate</th>
                </tr>
            </thead>
            <tbody>
                @if (!$vat_rates->count())
                <tr>
                    <td colspan="4">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($vat_rates as $vat_rate)

                @php
                $row = ($vat_rates ->currentpage() - 1) * $vat_rates ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $vat_rate->country->name }}</td>
                    <td>{{ $vat_rate->vat_rates."%" }}</td>
                   
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.accounting.vat-management.edit', $vat_rate->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <div class="float-end">
        {{ $vat_rates->links() }}
    </div>

</div>

@endsection