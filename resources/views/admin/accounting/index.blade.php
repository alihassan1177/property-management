@extends('layouts.admin.master')

@section('title', 'Accounting Management')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Accounting Management</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="bg-white shadow-sm p-4 rounded mb-5">
            <div style="gap: 20px" class="d-flex align-items-center justify-content-center mb-5 flex-wrap">
                <h4 class="m-0">Vat Management</h4>
                <div class="d-flex gap-3 flex-wrap">
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
        
            <div>
                {{ $vat_rates->links() }}
            </div>
        
        </div>
    </div>

    <div class="col-md-6">
        <div class="bg-white shadow-sm p-4 rounded mb-5">
            <div style="gap: 20px" class="d-flex align-items-center flex-wrap justify-content-center mb-5">
                <h4 class="m-0">Invoice Category Management</h4>
                <div class="d-flex gap-3 flex-wrap">
                    <form action="">
                        <input type="text" placeholder="Search" class="form-control">
                    </form>
                    <a href="{{ route('admin.accounting.invoice-categories.create') }}" class="btn btn-primary">
                        Add new Category
                    </a>
                </div>
            </div>
        
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$invoice_categories->count())
                        <tr>
                            <td colspan="4">
                                <p class="text-center m-0 py-3">No results found</p>
                            </td>
                        </tr>
                        @endif
        
                        @foreach ($invoice_categories as $invoice_category)
        
                        @php
                        $row = ($invoice_categories->currentpage() - 1) * $invoice_categories->perpage() + $loop->index + 1;
                        @endphp
        
                        <tr>
                            <th scope="row">{{ $row }}</th>
                            <td>{{ $invoice_category->name }}</td>                   
                            <td>
                                <div class="dropdown">
                                    <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                               
                                    <ul class="dropdown-menu">
        
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.accounting.invoice-categories.show', $invoice_category->id) }}">
                                                <button>View</button>
                                            </a>
                                        </li>
        
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.accounting.invoice-categories.edit', $invoice_category->id) }}">
                                                <button>Update</button>
                                            </a>
                                        </li>
        
                                        <li>
                                            <form class="dropdown-item" action="{{ route('admin.accounting.invoice-categories.delete', $invoice_category->id) }}" method="POST"
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
        
            <div>
                {{ $invoice_categories->links() }}
            </div>
        
        </div>
    </div>
</div>



<div class="bg-white shadow-sm p-4 rounded mb-5">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">Invoice Management</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.accounting.invoices.create') }}" class="btn btn-primary">
                Add new Invoice
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice No</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Due Amount</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                @if (!$invoices->count())
                <tr>
                    <td colspan="10">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($invoices as $invoice)

                @php
                $row = ($invoices->currentpage() - 1) * $invoices->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <th scope="row">{{ $invoice->invoice_no }}</th>
                    <th scope="row">{{ \Carbon\Carbon::parse($invoice->issue_date)->isoFormat('LL') }}</th>
                    <th scope="row">{{ \Carbon\Carbon::parse($invoice->due_date)->isoFormat('LL') }}</th>
                    <th scope="row">{{ $invoice->due_amount }}</th>
                    <th scope="row">{{ $invoice->total_amount }}</th>
                    <th scope="row">{{ $invoice->formatted_status }}</th>
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                       
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.accounting.invoices.show', $invoice->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.accounting.invoices.edit', $invoice->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>

                                <li>
                                    <form class="dropdown-item" action="{{ route('admin.accounting.invoices.delete', $invoice->id) }}" method="POST"
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

    <div>
        {{ $invoices->links() }}
    </div>

</div>

<div class="bg-white shadow-sm p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">Rent Invoice Management</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <a href="{{ route('admin.accounting.rent-invoices.create') }}" class="btn btn-primary">
                Add new Invoice
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice No</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Due Amount</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                @if (!$rent_invoices->count())
                <tr>
                    <td colspan="10">
                        <p class="text-center m-0 py-3">No results found</p>
                    </td>
                </tr>
                @endif

                @foreach ($rent_invoices as $invoice)

                @php
                $row = ($rent_invoices->currentpage() - 1) * $rent_invoices->perpage() + $loop->index + 1;
                @endphp

                <tr>
                    <th scope="row">{{ $row }}</th>
                    <th scope="row">{{ $invoice->invoice_no }}</th>
                    <th scope="row">{{ \Carbon\Carbon::parse($invoice->issue_date)->isoFormat('LL') }}</th>
                    <th scope="row">{{ \Carbon\Carbon::parse($invoice->due_date)->isoFormat('LL') }}</th>
                    <th scope="row">{{ $invoice->due_amount }}</th>
                    <th scope="row">{{ $invoice->total_amount }}</th>
                    <th scope="row">{{ $invoice->formatted_status }}</th>
                    <td>
                        <div class="dropdown">
                            <button class="btn-sm btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                       
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.accounting.invoices.show', $invoice->id) }}">
                                        <button>View</button>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.accounting.invoices.edit', $invoice->id) }}">
                                        <button>Update</button>
                                    </a>
                                </li>

                                <li>
                                    <form class="dropdown-item" action="{{ route('admin.accounting.invoices.delete', $invoice->id) }}" method="POST"
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

    <div>
        {{ $rent_invoices->links() }}
    </div>

</div>

@endsection