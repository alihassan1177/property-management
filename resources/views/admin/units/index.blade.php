@extends('layouts.admin.master')

@section('title', 'Unit Management')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <a href="#" class="btn">
            <i class="fa fa-arrow-left"></i>
        </a>
        <h3>Units Management</h3>
    </div>
</div>

<div class="bg-light p-4 rounded">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="m-0">All Units</h4>
        <div class="d-flex gap-3">
            <form action="">
                <input type="text" placeholder="Search" class="form-control">
            </form>
            <button class="btn">
                Refresh
            </button>
            <button class="btn btn-primary">
                Add new Unit
            </button>
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
        <nav class="float-end" aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><i style="font-size: 12px;"
                            class="fa fa-chevron-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i style="font-size: 12px;"
                            class="fa fa-chevron-right"></i></a></li>
            </ul>
        </nav>
    </div>

</div>

@endsection