<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AutomatedIndexing;
use App\Models\RentFollowUp;
use Illuminate\Http\Request;

class FinancialTrackingController extends Controller
{
    function index()
    {

        $rent_follow_ups = RentFollowUp::with(['invoice' => ['property' => ['tenant']]])
            ->latest()
            ->paginate(config('app.per_page_items'), ["*"], "rent_follow_ups");
        // dd($rent_follow_ups->toArray()["data"]);   

        $automated_indexings = AutomatedIndexing::latest()->paginate(config('app.per_page_items'), ["*"], 'automated_indexings');

        return view('admin.financial-tracking.index', compact('rent_follow_ups', 'automated_indexings'));
    }
}
