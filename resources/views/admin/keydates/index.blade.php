@extends('layouts.admin.master')

@section('title', 'Key Date Management')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Key Date Management</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Key Dates</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.keydates.create') }}" class="btn btn-primary">
                Add new Key Date
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>

                </tr>
            </thead>
            <tbody>
                @if (!$keydates->count())
                <tr>
                    <td colspan="6">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($keydates as $keydate)

                @php
                $row = ($keydates ->currentpage() - 1) * $keydates ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>

                    {{-- <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.units.show', $property->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.units.edit', $property->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>

                                <li>
                                    <form class="dropdown-item" action="{{ route('admin.units.delete', $property->id) }}" method="POST"
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
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="float-end">
        {{ $keydates->links() }}
    </div>

</div>

@endsection