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

        <div class="row g-3">
            <div class="col-12">
                <label class="form-label" for="key_date">Key Date</label>
                <input class="form-control" type="date" name="key_date" id="key_date">
                @error('key_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="reminder_date">Reminder Date</label>
                <input class="form-control" type="date" name="reminder_date" id="reminder_date">
                @error('reminder_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="key_date_description">Event</label>
                <textarea name="key_date_description" class="form-control" id="key_date_description" cols="30" rows="10"></textarea>
                @error('key_date_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="key_date">Property</label>
                <select style="width: 100%" name="property_id" id="property_id">
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">
                            {{ $property->cadastral_number . " : ". $property->address }}
                        </option>
                    @endforeach
                </select>
                @error('property_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>


    </form>

</div>

@endsection

@section('scripts')

<script>
    $(function() {
        $('#property_id').select2({
            width : 'style'
        })
    })
</script>

@endsection