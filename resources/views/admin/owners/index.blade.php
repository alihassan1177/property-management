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
                    <th scope="col">Unit Count</th>
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
                    <td>{{ $owner->property_count }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.owners.show', $owner->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.owners.edit', $owner->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>
                                <li>
                                    <form class="dropdown-item" action="{{ route('admin.owners.delete', $owner->id) }}" method="POST"
                                        onclick="return confirm('{{ __('Are you sure you want to delete this. This cannot be undone?') }}')">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit">
                                        Delete
                                    </button>
                                  </form>
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
        {{ $owners->links() }}
    </div>

</div>


@endsection