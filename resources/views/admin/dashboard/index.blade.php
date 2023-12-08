@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('content')

<div class="row gy-5">
    
    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
        <div class="bg-white p-3 rounded shadow-sm">
            <p class="text-tertiary fs-6 fw-bold text-center">Revenue</p>
            <div class="d-flex align-items-center justify-content-between">
                <span>This Month</span>
                <span class="btn btn-sm btn-outline-success">
                    $34,000
                </span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
        <div class="bg-white p-3 rounded shadow-sm">
            <p class="text-tertiary fs-6 fw-bold text-center">Tenants</p>
            <div class="d-flex align-items-center justify-content-between">
                <span>This Month</span>
                <span class="btn btn-sm btn-outline-info">
                    34
                </span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
        <div class="bg-white p-3 rounded shadow-sm">
            <p class="text-tertiary fs-6 fw-bold text-center">Units</p>
            <div class="d-flex align-items-center justify-content-between">
                <span>This Month</span>
                <span class="btn btn-sm btn-outline-success">
                    0
                </span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
        <div class="bg-white p-3 rounded shadow-sm">
            <p class="text-tertiary fs-6 fw-bold text-center">Contracts</p>
            <div class="d-flex align-items-center justify-content-between">
                <span>This Month</span>
                <span class="btn btn-sm btn-outline-danger">
                    10
                </span>
            </div>
        </div>
    </div>

</div>

<div class="row mt-2 gy-5">
    <div class="col-xxl-9">
        <div class="p-3 bg-white rounded shadow-sm">
            <h3 class="section-title">Quote Preview</h3>
            <div class="progress-wrapper">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center flex-grow-1">
                        <h4 class="m-0">Draft</h4>
                        <div class="progress w-100">
                            <div class="progress-bar bg-secondary" style="width: 10%;" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <p class="m-0">3%</p>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center flex-grow-1">
                        <h4 class="m-0">Pending</h4>
                        <div class="progress w-100">
                            <div class="progress-bar bg-primary" style="width: 15%;" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <p class="m-0">5%</p>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center flex-grow-1">
                        <h4 class="m-0">Not Paid</h4>
                        <div class="progress w-100">
                            <div class="progress-bar bg-warning" style="width: 25%;" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <p class="m-0">25%</p>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center flex-grow-1">
                        <h4 class="m-0">Overdue</h4>
                        <div class="progress w-100">
                            <div class="progress-bar bg-danger" style="width: 46%;" role="progressbar" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <p class="m-0">6%</p>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center flex-grow-1">
                        <h4 class="m-0">Partially Paid</h4>
                        <div class="progress w-100">
                            <div class="progress-bar bg-info" style="width: 18%;" role="progressbar" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <p class="m-0">8%</p>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center flex-grow-1">
                        <h4 class="m-0">Paid</h4>
                        <div class="progress w-100">
                            <div class="progress-bar bg-success" style="width: 55%;" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <p class="m-0">55%</p>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xxl-3">
        <div class="p-3 bg-white rounded shadow-sm">
            <h2 class="section-title text-center">Customer Preview</h2>
            <div class="circle-progress-wrapper">
                <h2>25%</h2>
            </div>
            <h6 class="text-center mt-3">New Customers this Month</h6>

            <div class="mt-5">
                <p class="text-secondary text-center">Active Customer</p>
                <p class="text-success text-center fs-1">
                    <i class="fa fa-arrow-up"></i>
                    11.28%
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2 gy-5">
    <div class="col-xxl-6 col-12">
        <div class="p-3 bg-white rounded shadow-sm">
            <h3 class="section-title">Recent Invoices</h3>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Unit no</th>
                            <th scope="col">Address</th>
                            <th scope="col">Cadastral Number</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Owner Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">U123</th>
                            <td>123 Main Street, Cityvile, 56789</td>
                            <td>CAD567890</td>
                            <td>ON4567</td>
                            <td>(555) 123-4567</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-12">
        <div class="p-3 bg-white rounded shadow-sm">
            <h3 class="section-title">Recent Contracts</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Unit no</th>
                            <th scope="col">Address</th>
                            <th scope="col">Cadastral Number</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Owner Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">U123</th>
                            <td>123 Main Street, Cityvile, 56789</td>
                            <td>CAD567890</td>
                            <td>ON4567</td>
                            <td>(555) 123-4567</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection