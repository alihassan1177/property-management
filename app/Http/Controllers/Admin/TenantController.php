<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitStatus;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Traits\ResultNotification;
use Carbon\Carbon;
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
        $units = Property::where(['status' => UnitStatus::Available])->get();
        return view('admin.tenants.create', compact('units'));
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
                'address' => 'required|max:1000'
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

        try {
            $values = array_merge($validated, $additional_values);
            $tenant = Tenant::create($values);
            $tenant->property()->update([
                'status' => UnitStatus::OnRent,
                'tenant_id' => $tenant->id
            ]);
            $this->successNotification('New tenant added successfully');
        } catch (\Exception $e) {
            info("TENANT CONTROLLER : STORE => " . $e->getMessage());
            $this->errorNotification('Something went wrong, please try again later');
        }

        return redirect()->route('admin.tenants.index');
    }
}
