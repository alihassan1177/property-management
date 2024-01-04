<?php

namespace App\Http\Controllers\Admin;

use App\Enums\InvoiceStatus;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\RentFollowUp;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentFollowUpController extends Controller
{
    use ResultNotification;

    function create()
    {
        $rent_invoices = Invoice::with(['property' => 'tenant'])->whereNull('invoice_category_id')->get();
        return view('admin.financial-tracking.rent-follow-ups.create', compact('rent_invoices'));
    }

    function store(Request $request)
    {
        $validator = validator($request->all(), [
            "notes" => "required|max:2000",
            "invoice_id" => "required|exists:invoices,id"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $rent_follow_up = RentFollowUp::create($validator->validated());

            $rent_follow_up->invoice->update([
                "status" => InvoiceStatus::Sent
            ]);

            DB::commit();
            $this->successNotification("Rent Follow Up Created successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            info("RENT FOLLOW UP CONTROLLER => STORE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.financial-tracking.index');
    }

    function show($id) {
        $rent_follow_up = RentFollowUp::with('invoice')->findOrFail($id);
        return view('admin.financial-tracking.rent-follow-ups.show', compact(''));
    }
}
