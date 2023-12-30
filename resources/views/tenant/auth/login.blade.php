@extends('layouts.tenant.auth')

@section('content')

<div class="auth-form-wrapper">
    
    <h2 class="fw-bold mb-4">Tenant Sign In</h2>

    <form method="POST" class="row g-3" action="{{ route('tenant.login.attempt') }}" >
        @csrf
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-user"></i>
                </span>
                <input name="email" placeholder="admin@admin.com" type="text" class="form-control">
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
                <input name="password" placeholder="password" type="password" class="form-control">
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