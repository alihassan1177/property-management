<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\UnitStatus;
use App\Models\Property;

class ChargeSettlementController extends Controller
{

    function create()
    {
        $property_id = request('property_id');
        if (!isset($property_id)) {

            $units = Property::where(['status' => UnitStatus::OnRent])
                ->with(
                    [
                        'invoices' => function ($query) {
                            return $query
                                ->whereNull('invoice_category_id')
                                ->whereDate('due_date', '<', now())
                                ->with('invoice_payments');
                        }
                    ]
                )
                ->get();

            dd($units->toArray());

            return view('admin.financial-tracking.charge-settlements.create', compact('units'));
        }

        $property = Property::with(['invoices' => function ($query) {
            return $query->whereNull('invoice_category_id')->with('invoice_payments');
        }, 'tenant', 'owner'])->withCount('invoices')->findOrFail($property_id);
        dd($property->toArray());

        return view('admin.financial-tracking.charge-settlements.create', compact('property'));
    }
}
