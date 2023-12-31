@extends('layouts.admin.master')

@section('title', 'Edit Unit')

@section('content')


<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Edit Unit</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <form method="POST" action="{{ route('admin.units.update', $property->id) }}">
        @csrf
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="m-0">Unit details form</h4>
            <div>
                <button class="btn btn-primary">
                    Save Unit
                </button>
            </div>
        </div>
    
        <div class="row g-5">
    
            <div class="col-lg-6">
                <h5 class="text-uppercase text-primary">
                    unit information
                </h5>
    
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Address:</p>
                        <input type="text" name="address" value="{{ old('address', $property->address) }}" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Cadastral Number:</p>
                        <input disabled readonly type="text" value="{{ old('cadastral_number', $property->cadastral_number) }}" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('cadastral_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Total Area:</p>
                        <input type="number" name="total_area" value="{{ old('total_area', $property->total_area) }}" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('total_area')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Floors:</p>
                        <input type="number" value="{{ old('floors', $property->floors) }}" name="floors" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('floors')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Bedrooms:</p>
                        <input type="number" name="number_of_beds" value="{{ old('number_of_beds', $property->number_of_beds) }}" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('number_of_beds')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between mb-3">
                        <p class="m-0">Bathrooms:</p>
                        <input name="number_of_baths" value="{{ old('number_of_baths', $property->number_of_baths) }}" type="number" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('number_of_baths')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
    
            <div class="col-lg-6">
                <h5 class="text-uppercase text-primary">
                    Rental Details
                </h5>   
                
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Rent Amount:</p>
                        <input type="number" value="{{ old('rent_amount', $property->rent_amount) }}" name="rent_amount" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('rent_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Security Deposit:</p>
                        <input type="number" value="{{ old('security_deposit', $property->security_deposit) }}" name="security_deposit" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('security_deposit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Rental Period:</p>
                        <input type="number" value="{{ old('rental_period', $property->rental_period) }}" name="rental_period" style="max-width: 300px;" class="form-control">
                    </div>
                    @error('rental_period')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror    
                </div>
                
            </div>
    
            <div class="col-lg-6">
                <h5 class="text-uppercase text-primary">
                    Owner information
                </h5>
                <select id="owner_select" style="width: 100%" name="owner_id">
                    @foreach ($owners as $owner)
                        <option @selected($owner->id === $property->owner->id) value="{{ $owner->id }}">{{ $loop->iteration . ". " . $owner->name . " : " . $owner->email }}</option>
                    @endforeach
                </select>
                @error('owner_id')
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
        $('#owner_select').select2({
            width : 'style'
        })
    })
</script>

@endsection