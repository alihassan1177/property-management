@extends('layouts.admin.master')

@section('title', 'Address Book')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Address Book</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Entries</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.address-book.create') }}" class="btn btn-primary">
                Add new Entry
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
                    <th scope="col">Visit Date</th>
                </tr>
            </thead>
            <tbody>
                @if (!$entries->count())
                <tr>
                    <td colspan="7">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($entries as $addressBook)

                @php
                $row = ($entries ->currentpage() - 1) * $entries ->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $addressBook->formated_name }}</td>
                    <td>{{ $addressBook->formated_email }}</td>
                    <td>{{ $addressBook->formated_phone }}</td>
                    <td>{{ \Carbon\Carbon::parse($addressBook->created_at)->isoFormat('ll') }}</td>
                   
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.address-book.show', $addressBook->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>

                                {{-- <li>
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
                                </li> --}}

                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <div class="float-end">
        {{ $entries->links() }}
    </div>

</div>

@endsection