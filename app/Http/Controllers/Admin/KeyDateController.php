<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitStatus;
use App\Http\Controllers\Controller;
use App\Models\KeyDate;
use App\Models\Property;
use App\Traits\ResultNotification;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KeyDateController extends Controller
{

    use ResultNotification;

    function index()
    {
        $keydates = KeyDate::latest()->paginate(config('app.per_page_items'));
        return view('admin.keydates.index', compact('keydates'));
    }

    function create()
    {
        $properties = Property::where(['status' => UnitStatus::OnRent])->get();
        return view('admin.keydates.create', compact('properties'));
    }

    function show($id){
        $keydate = KeyDate::findOrFail($id);
        return view('admin.keydates.show', compact('keydate'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "key_date" => "required|date",
            "reminder_date" => "required|date",
            "key_date_description" => "required|max:2000",
            "property_id" => "required|exists:properties,id"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $property = Property::findOrFail($request->property_id);
        $tenant_id = $property->tenant_id;

        $validated["tenant_id"] = $tenant_id;

        try {
            KeyDate::create($validated);
            $this->successNotification("Key date created successfully");
        } catch (\Exception $e) {
            info("KEY DATE CONTROLLER => STORE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.keydates.index');

    }

    function edit($id)
    {
        $keydate = KeyDate::findOrFail($id);
        return view('admin.keydates.edit', compact('keydate'));
    }

    function update(Request $request)
    {
    }

    function delete($id)
    {
        $keydate = KeyDate::findOrFail($id);
        try {
            $keydate->delete();
            $this->successNotification("Key date deleted successfully");
        } catch (\Exception $e) {
            info("KEY DATE CONTROLLER => DELETE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.keydates.index');
    }
}
