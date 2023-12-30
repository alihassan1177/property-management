@extends('layouts.admin.master')

@section('title', 'Add New Key Date')

@section('content')


<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Key Date</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <form method="POST" action="{{ route('admin.keydates.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Key date details form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Key Date
                </button>
            </div>
        </div>
    

    </form>

</div>

@endsection

@section('scripts')

<script>
    $(function() {

    })
</script>

@endsection