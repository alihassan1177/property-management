<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitStatus;
use App\Enums\UnitType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserType;
use App\Models\Property;
use App\Traits\ResultNotification;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{

    use ResultNotification;

    function index()
    {
        $units = Property::with('owner')->latest()->paginate(config('app.per_page_items'));
        return view('admin.units.index', compact('units'));
    }

    function create()
    {
        $owners = User::where(['user_type' => UserType::Owner])->latest()->get();
        $managers = User::where(['user_type' => UserType::Manager])->latest()->get();
        return view('admin.units.create', compact('owners', 'managers'));
    }

    function store(Request $request)
    {
        // dd(array_keys($request->all()));

        $rules = [
            "address" => "required",
            "total_area" => "required",
            "living_area" => "required",
            "floors" => "required",
            "number_of_beds" => "required",
            "number_of_baths" => "required",
            "owner_id" => "required|exists:users,id",
            "tenancy_agreement_terms" => "required",
            "additional_notes" => "nullable",
            "rent_amount" => "required",
            "security_deposit" => "required",
            "rental_period" => "required",
            "gas_information" => "nullable",
            "gas_price" => "nullable",
            "electricity_information" => "nullable",
            "electricity_price" => "nullable",
            "water_information" => "nullable",
            "water_price" => "nullable",
            "internet_information" => "nullable",
            "internet_price" => "nullable",
            "epc" => "required|mimes:pdf|max:10000",
        ];

        $validator = Validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $file = $request->file('epc');
        $filename = time() . "-" . strtolower(str_replace(" ", "-", $file->getClientOriginalName()));
        $destinationPath = 'uploads';
        $file->move($destinationPath, $filename);

        $validated = $validator->validated();

        $electricity_info = serialize(["info" => $validated["electricity_information"], "price" => $validated["electricity_price"]]);
        $gas_info = serialize(["info" => $validated["gas_information"], "price" => $validated["gas_price"]]);
        $water_info = serialize(["info" => $validated["water_information"], "price" => $validated["water_price"]]);
        $internet_info = serialize(["info" => $validated["internet_information"], "price" => $validated["internet_price"]]);

        $cadastral_number = "CAD" . time() + rand(1000, 9999);

        $additionalValues = [
            'status' => UnitStatus::Available,
            'electricity_information' => $electricity_info,
            'gas_information' => $gas_info,
            'water_information' => $water_info,
            'internet_information' => $internet_info,
            'energy_performance_certificate' => $filename,
            'cadastral_number' => $cadastral_number
        ];

        $values = array_merge($validated, $additionalValues);

        try {
            Property::create($values);
            $this->successNotification("New Unit added successfully");
        } catch (\Exception $e) {
            info("UNIT CONTROLLER : STORE => " . $e->getMessage());
            $this->errorNotification('Something went wrong, please try again later');
        }

        return redirect()->route('admin.units.index');
    }

    function edit($id)
    {
        $property = Property::where(['id' => $id])->firstOrFail();
        $owners = User::where(['user_type' => UserType::Owner])->get();
        return view('admin.units.edit', compact('property', 'owners'));
    }

    function update(Request $request, $id)
    {

        $property = Property::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'address' => 'required|max:1000',
                'rent_amount' => 'integer|required',
                'number_of_beds' => 'integer|required',
                'number_of_baths' => 'integer|required',
                'total_area' => 'integer|required',
                'rental_period' => 'integer|required',
                'security_deposit' => 'integer|required',
                'floors' => 'integer|required',
                'owner_id' => 'required|exists:users,id'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validated = $validator->validated();

        try {
            $property->update($validated);
            $this->successNotification("New Unit updated successfully");
        } catch (\Exception $e) {
            info("UNIT CONTROLLER : UPDATE => " . $e->getMessage());
            $this->errorNotification('Something went wrong, please try again later');
        }

        return redirect()->route('admin.units.index');
    }

    function show($id)
    {
        $property = Property::with(['owner', 'tenant', 'manager'])->findOrFail($id);
        return view('admin.units.show', compact('property'));
    }

    function delete($id)
    {
        $property = Property::where(['id' => $id])->with('owner')->firstOrFail();

        try {
            if ($property->status == UnitStatus::Available->value) {
                $property->delete();
                $this->successNotification("Unit removed succesfully");
            } else {
                $this->errorNotification("Unit cannot be removed");
            }
        } catch (\Exception $e) {
            info("UNIT CONTROLLER : DELETE => " . $e->getMessage());
            $this->errorMessage("Something went wrong, please try again later");
        }

        return redirect()->route('admin.units.index');
    }
}
