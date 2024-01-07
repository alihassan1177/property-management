@extends('layouts.admin.master')

@section('title', 'Financial Tracking')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Financial Tracking</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded mb-5">
    <div style="gap: 20px" class="d-flex align-items-center justify-content-between mb-5 flex-wrap">
        <h4 class="m-0">Rent Follow Up</h4>
        <div class="d-flex gap-3 flex-wrap">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.financial-tracking.rent-follow-ups.create') }}" class="btn btn-primary">
                Add new Entry
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice NO</th>
                    <th scope="col">Property Cadastral NO</th>
                    <th scope="col">Tenant Name</th>
                    <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody>
                @if (!$rent_follow_ups->count())
                <tr>
                    <td colspan="4">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($rent_follow_ups as $rent_follow_up)

                @php
                $row = ($rent_follow_ups ->currentpage() - 1) * $rent_follow_ups ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $rent_follow_up->invoice->invoice_no }}</td>
                    <td>{{ $rent_follow_up->invoice->property->cadastral_number }}</td>
                    <td>{{ $rent_follow_up->invoice->property->tenant->name }}</td>
                    <td>{{ Str::limit($rent_follow_up->notes, 20, "...") }}</td>
                    
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.financial-tracking.rent-follow-ups.show', $rent_follow_up->id) }}">
                                        <button>View</button>
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

    <div>
        {{ $rent_follow_ups->links() }}
    </div>

</div>

<div class="bg-white shadow-sm p-4 rounded mb-5">
    <div style="gap: 20px" class="d-flex align-items-center justify-content-between mb-5 flex-wrap">
        <h4 class="m-0">Automated Indexings</h4>
        <div class="d-flex gap-3 flex-wrap">
        
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>

            <form method="POST" action="{{ route('admin.financial-tracking.automated-indexings.index-docs') }}">
                @csrf
                <button class="btn btn-primary">Index Docs</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Content</th>
                </tr>
            </thead>
            <tbody>
                @if (!$automated_indexings->count())
                <tr>
                    <td colspan="4">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($automated_indexings as $automated_indexing)

                @php
                $row = ($automated_indexings ->currentpage() - 1) * $automated_indexings ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $automated_indexing->document_name }}</td>
                    <td>{{ $automated_indexing->document_type }}</td>
                    <td>{{ \Carbon\Carbon::parse($automated_indexing->document_date)->isoFormat('LL') }}</td>
                    <td>{{ Str::limit($automated_indexing->document_content, 50, "...") }}</td>

                    
                    <td>
                        {{-- <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.financial-tracking.rent-follow-ups.show', $rent_follow_up->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>

                            </ul>
                        </div> --}}
                    </td>
                    
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <div>
        {{ $automated_indexings->links() }}
    </div>

</div>


@endsection