<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContractStatus;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Property;
use App\Enums\UnitStatus;
use App\Models\AddressBook;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{

    use ResultNotification;

    function index()
    {
        $contracts = Contract::with(
            [
                'property' => ['owner'],
                'tenant'
            ]
        )->latest()->paginate(config('app.per_page_items'));
        return view('admin.contracts.index', compact('contracts'));
    }

    function create()
    {
        $properties = Property::whereNull('tenant_id')->where('status', UnitStatus::Available->value)->get();
        $tenants = AddressBook::get();
        return view('admin.contracts.create', compact('properties', 'tenants'));
    }

    function store(Request $request)
    {
        $validator = validator()->make($request->all(), [
            "property_id" => "required",
            "tenant_id" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "late_fee_amount" => "required",
            "early_termination_fee_amount" => "required",
            "document" => "required|file"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $document = request()->file('document');
        $documentName = time() . "-" . $document->getClientOriginalName();
        $documentPath = $document->move("uploads/contracts", $documentName);

        $property = Property::findOrFail($request->property_id);

        $validated  = $validator->validated();

        $validated['document'] = $documentPath;
        $validated['rent_amount'] = $property->rent_amount;
        $validated['security_deposit'] = $property->security_deposit;
        $validated['status'] = ContractStatus::Valid;

        DB::beginTransaction();
        try {
            Contract::create($validated);
            $property->update([
                'status' => UnitStatus::OnRent,
                'tenant_id' => $request->tenant_id
            ]);
            DB::commit();
            $this->successNotification("Contract added successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            info('ERROR WHILE CREATING CONTRACT : ' . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }
        return redirect()->route('admin.contracts.index');
    }

    function show($id)
    {
        $contract = Contract::with([
            'property' => ['owner'],
            'tenant'
        ])->findOrFail($id);

        $statuses = ContractStatus::cases();

        return view('admin.contracts.show', compact('contract', 'statuses'));
    }

    function changeStatus(Request $request, $id)
    {
        $validator = validator()->make($request->all(), [
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $contract = Contract::with([
            'property' => ['owner'],
            'tenant'
        ])->findOrFail($id);

        $property = $contract->property;

        DB::beginTransaction();
        try {
            if ($request->status == ContractStatus::Expired->value || $request->status == ContractStatus::Teminated->value) {
                $property->update([
                    'status' => UnitStatus::Available
                ]);
            }

            if ($request->status == ContractStatus::Valid->value) {
                $property->update([
                    'status' => UnitStatus::OnRent
                ]);
            }

            $contract->update([
                'status' => $request->status
            ]);

            DB::commit();
            $this->successNotification("Status updated successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            info('ERROR : ' . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return back();
    }

    function delete($id)
    {
        $contract = Contract::with([
            'property' => ['owner'],
            'tenant'
        ])->findOrFail($id);

        $property = $contract->property;

        if ($contract->status == ContractStatus::Expired->value || $contract->status  == ContractStatus::Teminated->value) {
            $contract->delete();
            $property->update([
                'status' => UnitStatus::Available
            ]);
            $this->successNotification("Contract deleted successfully");
        } else {
            $this->errorNotification("Cannot delete a valid contract");
        }

        return back();
    }
}
