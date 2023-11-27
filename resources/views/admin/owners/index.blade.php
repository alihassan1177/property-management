@extends('layouts.admin.master')

@section('title', 'Manage Owners')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Manage Owners</h3>
    </div>
</div>


<div class="bg-light p-4 rounded">

    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Owners</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.owners.create') }}" class="btn btn-primary">
                Add new Owner
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>

                @if (!$owners->count())
                <tr>
                    <td colspan="4">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($owners as $owner)

                @php
                $row = ($owners ->currentpage() - 1) * $owners ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->phone }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="float-end">
        {{ $owners->links() }}
    </div>

</div>


@endsection