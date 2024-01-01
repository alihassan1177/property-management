<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\VatRate;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VatController extends Controller
{

    use ResultNotification;

    function create() {
        $countries = Country::all();
        return view('admin.accounting.vat-management.create', compact('countries'));
    }

    function store(Request $request) {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            "vat_rates" => "required|max:100",
            "country_id" => "required|unique:vat_rates,country_id|exists:countries,id"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            VatRate::create($validator->validated());
            $this->successNotification("VAT Rate added successfully");
        } catch (\Exception $e) {
            info('VAT CONTROLLER => STORE : ' . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.index');
    }
}
