@extends('layouts.admin.master')

@section('title', 'Add New Address Book Entry')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Address Book Entry</h3>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-sm">
    <form method="POST" id="address-book-form" action="{{ route('admin.address-book.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Entry form</h4>
            <div>
                <button type="button" class="btn btn-success" id="add-user">Add User</button>
                <button class="btn btn-primary">
                    Save Entry
                </button>
            </div>
        </div>
        

        <div id="user-wrapper">
            <div id="user-fields" class="row g-3">
                <div class="form-group col-md-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter phone" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required placeholder="Enter address" id="">
                </div>
                <hr class="border-secondary my-4">
            </div>
        </div>

        

    </form>

</div>

@endsection

@section('scripts')

<script>
    var userFields = document.getElementById("user-fields");
    var usesWrapper = document.getElementById("user-wrapper");
    var userCount = 1;

    document.getElementById("add-user").addEventListener("click", function() {
        userCount++;

        var newUserFields = userFields.cloneNode(true);
        newUserFields.id = "user-fields" + userCount;

        var nameLabel = newUserFields.getElementsByTagName("label")[0];
        nameLabel.htmlFor = "name" + userCount;
        var nameInput = newUserFields.getElementsByTagName("input")[0];
        nameInput.id = "name" + userCount;
        nameInput.name = "name" + userCount

        var emailLabel = newUserFields.getElementsByTagName("label")[1];
        emailLabel.htmlFor = "email" + userCount;
        var emailInput = newUserFields.getElementsByTagName("input")[1];
        emailInput.id = "email" + userCount;
        emailInput.name = "email" + userCount;

        var phoneLabel = newUserFields.getElementsByTagName("label")[2];
        phoneLabel.htmlFor = "phone" + userCount;
        var phoneInput = newUserFields.getElementsByTagName("input")[2];
        phoneInput.id = "phone" + userCount;
        phoneInput.name = "phone" + userCount;

        var addressLabel = newUserFields.getElementsByTagName("label")[3];
        addressLabel.htmlFor = "address" + userCount;
        var addressInput = newUserFields.getElementsByTagName("input")[3];
        addressInput.id = "address" + userCount;
        addressInput.name = "address" + userCount;

        usesWrapper.appendChild(newUserFields);
    });
</script>

@endsection
