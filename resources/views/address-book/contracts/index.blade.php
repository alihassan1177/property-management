@extends('layouts.address-book.master')

@section('title', 'Contracts')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Contracts</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Contracts</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.contracts.create') }}" class="btn btn-primary">Add Contract</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Contract ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Owner Phone</th>
                    <th scope="col">Tenant Phone</th>
                </tr>
            </thead>
            <tbody>

                @if (!$contracts->count())
                <tr>
                    <td colspan="10">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($contracts as $contract)

                @php
                $row = ($contracts ->currentpage() - 1) * $contracts ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <th scope="row">{{ $contract->contract_id }}</th>
                    <th scope="row">
                        <span class="badge @if($contract->status == 'valid') bg-success @else bg-danger @endif">{{ str_replace("_", " ", strtoupper($contract->status)) }}</span>
                    </th>
                    <th scope="row">{{ \Carbon\Carbon::parse($contract->start_date)->isoFormat('LL') }}</th>
                    <th scope="row">{{ \Carbon\Carbon::parse($contract->end_date)->isoFormat('LL') }}</th>
                    <th scope="row">{{ $contract->tenant->phone }}</th>
                    <th scope="row">{{ $contract->property->owner->phone }}</th>
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('address_book.contracts.show', $contract->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="dropdown-item" href="{{ route('admin.contracts.edit', $contract->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li> --}}
           
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div>
        {{ $contracts->links() }}
    </div>

</div>

@endsection