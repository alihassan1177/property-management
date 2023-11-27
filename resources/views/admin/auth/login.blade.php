@extends('layouts.admin.auth')

@section('content')

<div class="auth-form-wrapper">
    
    <h2 class="fw-bold mb-4">Sign In</h2>

    <form method="POST" class="row g-3" action="{{ route('admin.login.attempt') }}" >
        @csrf
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-user"></i>
                </span>
                <input name="email" placeholder="admin@demo.com" type="text" class="form-control">
            </div>
            @error('email')
            <span class="text-danger">
                {{ $message }}
            </span>   
            @enderror
        </div>
        <div class="col-12">
            <div class="input-group position-relative">
                <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                </span>
                <input name="password" placeholder="admin123" type="password" class="form-control">
                <button type="button" class="btn position-absolute top-0 bottom-0 end-0 password-toggle">
                    <i id="icon" class="fa fa-eye-slash"></i>
                </button>
            </div>
            @error('password')
            <span class="text-danger">
                {{ $message }}
            </span>                
            @enderror
        </div>

        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary w-100">Log in</button>
        </div>

    </form>
</div>

@endsection