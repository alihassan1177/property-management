@extends('layouts.admin.master')

@section('title', 'Manage Tenants')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <a href="#" class="btn">
            <i class="fa fa-arrow-left"></i>
        </a>
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
            <a href="add-invoice.html" class="btn btn-primary">
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
                    <th scope="col">Address</th>
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