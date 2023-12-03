@extends('layouts.admin.master')

@section('title', 'Add New Task')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Task</h3>
    </div>
</div>

<div class="bg-light p-4 rounded">
    <form method="POST" action="{{ route('admin.tasks.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Task details form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Task
                </button>
            </div>
        </div>
    
        <div class="row g-5">
    
            <div class="col-lg-6">
                <h5 class="text-uppercase text-primary">
                    task information
                </h5>
    
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Address:</p>
                        <input type="text" name="address" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
    

        </div>
    
    </form>

</div>

@endsection

@section('scripts')

{{-- <script>
    $(function() {
        $('#owner_select').select2({
            width : 'style'
        })
    })
</script> --}}

@endsection