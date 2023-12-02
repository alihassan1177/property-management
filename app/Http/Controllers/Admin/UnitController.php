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
        return view('admin.units.create', compact('owners'));
    }

    function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'address' => 'required|max:1000',
                'rent_amount' => 'integer|required',
                'number_of_beds' => 'integer|required',
                'number_of_baths' => 'integer|required',
                'total_area' => 'integer|required',
                'cadastral_number' => 'required|min:6|max:30|unique:properties,cadastral_number',
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

        $additionalValues = ['status' => UnitStatus::Available];

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
        $property = Property::with(['owner', 'tenant'])->findOrFail($id);
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
