<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class VatController extends Controller
{
    function create() {
        $countries = Country::all();
        return view('admin.accounting.vat-management.create', compact('countries'));
    }

    function store() {
        
    }
}
