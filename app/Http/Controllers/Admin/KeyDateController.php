<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitStatus;
use App\Http\Controllers\Controller;
use App\Models\KeyDate;
use App\Models\Property;
use Illuminate\Http\Request;

class KeyDateController extends Controller
{

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

    function store(Request $request)
    {
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
            $this->successNotification("");
        } catch (\Exception $e) {
            info("KEY DATE CONTROLLER => DELETE : " . $e->getMessage());
            $this->errorNotification("");
        }

        return redirect()->route('admin.keydates.index');
    }
}
