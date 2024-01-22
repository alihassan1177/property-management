@extends('layouts.admin.master')

@section('title', 'Add New Unit')

@section('content')


<div class="page-header">
    <div class="d-flex align-items-center">
        <h3>Add New Unit</h3>
    </div>
</div>

<div class="bg-white shadow-sm p-4 rounded">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.units.store') }}">
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
                        <input type="text" name="address" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Total Area:</p>
                        <input type="number" name="total_area" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('total_area')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Living Area:</p>
                        <input type="number" name="living_area" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('living_area')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Floors:</p>
                        <input type="number" name="floors" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('floors')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Bedrooms:</p>
                        <input type="number" name="number_of_beds" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('number_of_beds')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between mb-3">
                        <p class="m-0">Bathrooms:</p>
                        <input name="number_of_baths" type="number" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('number_of_baths')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <hr class="my-4">
                <h5 class="text-uppercase text-primary">
                    Country
                </h5>
                <select id="country_select" style="width: 100%" name="country_id">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $loop->iteration . ". " . $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <hr class="my-4">

                <h5 class="text-uppercase text-primary">
                    Owner information
                </h5>
                <select id="owner_select" style="width: 100%" name="owner_id">
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $loop->iteration . ". " . $owner->name . " : " . $owner->email }}</option>
                    @endforeach
                </select>
                @error('owner_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <hr class="my-4">

                <h5 class="text-uppercase text-primary">
                    Manager information
                </h5>
                <select id="manager_select" style="width: 100%" name="manager_id">
                    <option value="">No manager selected</option>
                    @foreach ($managers as $manager)
                        <option value="{{ $manager->id }}">{{ $loop->iteration . ". " . $manager->name . " : " . $manager->email }}</option>
                    @endforeach
                </select>
                @error('manager_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <hr class="my-4">

                <h5 class="text-uppercase text-primary">
                    Tenancy Agreement Terms
                </h5>

                <textarea placeholder="Use comma separated values for mulitple terms" name="tenancy_agreement_terms" class="form-control form-control-sm" cols="30" rows="10"></textarea>

                <hr class="my-4">

                <h5 class="text-uppercase text-primary">
                    Additional Notes
                </h5>

                <textarea  name="additional_notes" class="form-control form-control-sm" cols="30" rows="10"></textarea>

            </div>
    
            <div class="col-lg-6">
                <h5 class="text-uppercase text-primary">
                    Rental Details
                </h5>   
                
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Rent Amount:</p>
                        <input type="number" name="rent_amount" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('rent_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Security Deposit:</p>
                        <input type="number" name="security_deposit" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('security_deposit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Rental Period:</p>
                        <input type="number" name="rental_period" style="max-width: 300px;" class="form-control form-control-sm">
                    </div>
                    @error('rental_period')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror    
                </div>
            
                <hr class="my-4">

                <h5 class="text-uppercase text-primary">
                    Resources information
                </h5>
                <div class="">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Gas:</p>
                    </div>
                    <div class="mb-1">
                        <strong class="mb-1 d-inline-block"><small>Information</small></strong>
                        <input type="text" class="form-control form-control-sm" name="gas_information">
                        @error('gas_information')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <strong class="mb-1 d-inline-block"><small>Price</small></strong>
                        <input type="number" class="form-control form-control-sm" value="0" name="gas_price">
                        @error('gas_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-3">

                <div class="">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Electricity:</p>
                    </div>
                    <div class="mb-1">
                        <strong class="mb-1 d-inline-block"><small>Information</small></strong>
                        <input type="text" class="form-control form-control-sm" name="electricity_information">
                        @error('electricity_information')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <strong class="mb-1 d-inline-block"><small>Price</small></strong>
                        <input type="number" class="form-control form-control-sm" value="0" name="electricity_price">
                        @error('electricity_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-3">

                <div class="">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Water:</p>
                    </div>
                    <div class="mb-1">
                        <strong class="mb-1 d-inline-block"><small>Information</small></strong>
                        <input type="text" class="form-control form-control-sm" name="water_information">
                        @error('water_information')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <strong class="mb-1 d-inline-block"><small>Price</small></strong>
                        <input type="number" class="form-control form-control-sm" value="0" name="water_price">
                        @error('water_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-3">

                <div class="">
                    <div class="d-flex gap-4 align-items-center justify-content-between">
                        <p class="m-0">Internet:</p>
                    </div>
                    <div class="mb-1">
                        <strong class="mb-1 d-inline-block"><small>Information</small></strong>
                        <input type="text" class="form-control form-control-sm" name="internet_information">
                        @error('internet_information')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <strong class="mb-1 d-inline-block"><small>Price</small></strong>
                        <input type="number" class="form-control form-control-sm" value="0" name="internet_price">
                        @error('internet_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="text-uppercase text-primary">
                    energy performance certificate 
                </h5>

                <input type="file" class="form-control form-control-sm" name="epc" id="">
                @error('epc')
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

        $('#manager_select').select2({
            width : 'style'
        })

        $('#country_select').select2({
            width : 'style'
        })
    })
</script>

@endsection