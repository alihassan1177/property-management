<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VatRate;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    function index() {
        $vat_rates = VatRate::latest()->paginate(config('app.per_page_items'), ["*"], "vat_rates");
        return view('admin.accounting.index', compact('vat_rates'));
    }

}
