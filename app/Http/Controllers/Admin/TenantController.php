<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContractStatus;
use App\Enums\UnitStatus;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Traits\ResultNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class TenantController extends Controller
{

    use ResultNotification;

    function index()
    {
        $tenants = Tenant::latest()->paginate(config('app.per_page_items'));
        return view('admin.tenants.index', compact('tenants'));
    }

    function create()
    {
        $property_id = request('property_id');
        if (!isset($property_id)) {            
            $units = Property::where(['status' => UnitStatus::Available])->get();
            return view('admin.tenants.create', compact('units'));
        }

        $property = Property::findOrFail($property_id);
        return view('admin.tenants.create', compact('property'));
        
    }

    function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:6|max:128',
                'email' => 'required|email|unique:tenants,email|max:256',
                'phone' => 'required|min:11|max:11|unique:tenants,phone',
                'property_id' => 'required|exists:properties,id',
                'address' => 'required|max:1000',
                'late_fee_charges' => 'required|integer',
                'early_termination_fee_amount' => 'required|integer'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $additional_values = [
            'move_in_date' => Carbon::now(),
            'password' => bcrypt('password')
        ];

        DB::beginTransaction();

        try {
            $values = array_merge($validated, $additional_values);
            
            $property = Property::findOrFail($validated['property_id']);

            $tenant = Tenant::create($values);
        
            $property->update([
                'status' => UnitStatus::OnRent,
                'tenant_id' => $tenant->id
            ]);

            Contract::create([
                "tenant_id" => $tenant->id,
                "property_id" => $validated['property_id'],
                "late_fee_amount" => $validated['late_fee_charges'],
                "early_termination_fee_amount" => $validated['early_termination_fee_amount'],
                "start_date" => Carbon::now(),
                "end_date" => Carbon::now()->addMonths($property->rental_period),
                "status" => ContractStatus::Valid,
                "rent_amount" => $property->rent_amount,
                "security_deposit" => $property->security_deposit
            ]);

            DB::commit();

            $this->successNotification('New tenant added successfully');
        } catch (\Exception $e) {
            info("TENANT CONTROLLER : STORE => " . $e->getMessage());
            DB::rollBack();
            $this->errorNotification('Something went wrong, please try again later');
        }

        return redirect()->route('admin.tenants.index');
    }

    function show($id) {
        $tenant = Tenant::with('property')->findOrFail($id);
        return view('admin.tenants.show', compact('tenant'));
    }

    function delete($id) {
        $tenant = Tenant::with('property')->findOrFail($id);

        try {   
            $tenant->property->update([
                "tenant_id" => null,
                "status" => UnitStatus::Available
            ]);
    
            $tenant->delete();
            $this->successNotification("Tenant removed successfully");
        } catch (\Exception $e) {
            info("TENANT CONTROLLER => DELETE : ". $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.tenants.index');
    }

}
