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
        $countries = Country::whereDoesntHave('vat_rate')->get();
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

    function edit($id) {
        $vat_rate = VatRate::findOrFail($id);
        $countries = Country::all();
        return view("admin.accounting.vat-management.edit", compact('vat_rate', 'countries'));
    }

    function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            "vat_rates" => "required|integer|max:100"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $vat_rate = VatRate::findOrFail($id);

        try {
            $vat_rate->update($validator->validated());
            $this->successNotification("VAT Rate updated successfully");
        } catch (\Exception $e) {
            info("VAT CONTROLLER => UPDATE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.index');
    }

}
