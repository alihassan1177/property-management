<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    InvoiceCategory,
    Property,
    Invoice
};
use App\Enums\UnitStatus;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;

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
            'tax_percentage' => 'required|integer',
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
}
