<?php

namespace App\Http\Controllers\Admin;

use App\Enums\InvoiceStatus;
use App\Http\Controllers\Controller;
use App\Models\{
    InvoiceCategory,
    Property,
    Invoice
};
use App\Enums\UnitStatus;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    use ResultNotification;

    function create()
    {
        $invoice_categories = InvoiceCategory::all();
        $properties = Property::where(['status' => UnitStatus::OnRent])->get();
        return view('admin.accounting.invoices.create', compact('invoice_categories', 'properties'));
    }

    function store(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'property_id' => 'nullable|exists:properties,id',
            'invoice_category_id' => 'required|exists:invoice_categories,id',
            'total_amount' => 'required|integer',
            'tax_percentage' => 'required|integer|max:100',
            'notes' => 'required|max:2000',
            'issue_date' => 'required|date',
            'due_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            Invoice::create($validator->validated());
            $this->successNotification("New Invoice Created Successfully");
        } catch (\Exception $e) {
            info("INVOICE CONTROLLER => STORE : " . $e->getMessage());
            $this->errorNotification("Someting went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.index');
    }

    function show($id)
    {
        $invoice = Invoice::with('property')->findOrFail($id);
        return view('admin.accounting.invoices.show', compact('invoice'));
    }

    function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        if ($invoice->status != InvoiceStatus::Draft->value) {
            $this->errorNotification("Unable to edit invoice");
            return redirect()->route('admin.accounting.index');
        }

        $invoice_categories = InvoiceCategory::all();
        $properties = Property::where(['status' => UnitStatus::OnRent])->get();

        return view('admin.accounting.invoices.edit', compact('invoice', 'properties', 'invoice_categories'));
    }

    function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        if ($invoice->status != InvoiceStatus::Draft->value) {
            $this->errorNotification("Unable to edit invoice");
            return redirect()->route('admin.accounting.index');
        }

        $validator = validator()->make($request->all(), [
            'notes' => 'required|max:2000',
            'due_date' => 'required|date',
            'issue_date' => 'required|date',
            'tax_percentage' => 'required|integer|max:100',
            'total_amount' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $invoice->update($validator->validated());
            $this->successNotification("Invoice updated successfully");
        } catch (\Exception $e) {
            info("INVOICE CONTROLLER => UPDATE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.invoices.show', $invoice->id);
    }

    function add_payment(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $validator = validator()->make($request->all(), [
            'paid_amount' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->paid_amount > $invoice->due_amount) {
            $this->errorNotification("Cannot add more payment amount then due amount");
            return back();
        }

        $validated = $validator->validated();
        $additional_values = [];

        if (!is_null($invoice->paid_amount)) {
            $validated["paid_amount"] = $validated["paid_amount"] + $invoice->paid_amount;
        }

        if ($request->paid_amount == $invoice->taxed_amount || ($request->paid_amount + $invoice->paid_amount) == $invoice->taxed_amount) {
            $additional_values["status"] = InvoiceStatus::Paid;
        } else {
            $additional_values["status"] = InvoiceStatus::PartiallyPaid;
        }

        $values = array_merge($validated, $additional_values);

        try {
            $invoice->update($values);
            $this->successNotification("Invoice Payment added successfully");
        } catch (\Exception $e) {
            info("INVOICE CONTROLLER => ADD PAYMENT : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.invoices.show', $invoice->id);
    }

    function delete($id)
    {
        $invoice = Invoice::findOrFail($id);

        try {
            if (is_null($invoice->paid_amount)) {
                $invoice->delete();
                $this->successNotification("Invoice deleted successfully");
            } else {
                $this->errorNotification("Unable to delete invoice");
            }
        } catch (\Exception $e) {
            info("INVOCE CONTROLLER => DELETE ");
        }

        return redirect()->route('admin.accounting.index');
    }
}
