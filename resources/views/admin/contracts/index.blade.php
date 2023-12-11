@extends('layouts.admin.master')

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
        </div>
    </div>

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

    <div>
       
    </div>

</div>

@endsection