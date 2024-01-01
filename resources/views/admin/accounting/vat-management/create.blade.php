@extends('layouts.admin.master')

@section('title', 'Add New Vat Rate')

@section('content')

<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Vat Rate</h3>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-sm">
    <form method="POST" action="{{ route('admin.accounting.vat-management.store') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Entry form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Entry
                </button>
            </div>
        </div>
    
        <div class="row g-5">
    
            <div class="col-12">
    
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label" for="vat_rates">Vat Rates</label>
                        <input value="{{ old('vat_rates') }}" placeholder="Enter your Vat rates" type="number" id="vat_rates" name="vat_rates" class="form-control">
                    </div>
                    @error('vat_rates')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label" for="country_select">Country</label>
                        <select id="country_select" style="width: 100%" name="country_id">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $loop->iteration . ". " . $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('country_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
    
            </div>
    
    
        </div>
    
    </form>

</div>

@endsection

@section('scripts')

<script>
        $('#country_select').select2({
            width : 'style'
        })
</script>

@endsection