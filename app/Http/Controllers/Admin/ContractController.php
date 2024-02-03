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
            "document" => "required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $document = request()->file('document');
        $documentName = time() . "-" . $document->getClientOriginalName();
        $documentPath = $document->move("/uploads/contracts", $documentName);

        $property = Property::findOrFail($request->property_id);

        $validated  = $validator->validated();

        $validated['document'] = $documentPath;
        $validated['rent_amount'] = $property->rent_amount;
        $validated['security_deposit'] = $property->security_deposit;
        $validated['status'] = ContractStatus::Valid;

        try {
            Contract::create($validated);
            $this->successNotification("Contract added successfully");            
        } catch (\Exception $e) {
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
        return view('admin.contracts.show', compact('contract'));
    }
}
