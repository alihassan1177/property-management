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
use PhpParser\Node\Stmt\TryCatch;

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

    function store(Request $request) {
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
}
