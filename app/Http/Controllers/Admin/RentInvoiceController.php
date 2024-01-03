<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitStatus;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Property;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;

class RentInvoiceController extends Controller
{

    use ResultNotification;

    function create(Request $request)
    {
        if (isset($request->property_id) && $request->property_id) {
            $selected_property = Property::with('tenant')->findOrFail($request->property_id);
            return view('admin.accounting.rent-invoices.create', compact('selected_property'));
        }

        $properties = Property::where(['status' => UnitStatus::OnRent])->get();
        return view('admin.accounting.rent-invoices.create', compact('properties'));
    }

    function store(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'tenant_id' => 'required|exists:tenants,id',
            'notes' => 'required|max:2000',
            'issue_date' => 'required|date',
            'due_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $property = Property::findOrFail($request->property_id);

        $validated = $validator->validated();

        $additional_values = [
            "total_amount" => $property->total_rent_amount,
            "tax_percentage" => $property->country->vat_rate->vat_rates ?? 0
        ];

        // dd($additional_values);

        $values = array_merge($validated, $additional_values);

        try {
            Invoice::create($values);
            $this->successNotification("Rent Invoice created successfully");
        } catch (\Exception $e) {
            info("RENT INVOCE CONTROLLER => STORE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.index');
    }
}
