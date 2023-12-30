@extends('layouts.owner.master')

@section('title', 'Dashboard')

@section('content')

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