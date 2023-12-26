<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    function index() {
        $contracts = Contract::latest()->paginate(config('app.per_page_items'));
        return view('admin.contracts.index', compact('contracts'));   
    }
}
