<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    function index()
    {
        $contracts = Contract::with(
            [
                'property' => ['owner'],
                'tenant'
            ]
        )->latest()->paginate(config('app.per_page_items'));
        return view('admin.contracts.index', compact('contracts'));
    }

    function show($id)
    {
        $contract = Contract::with([
            'property' => ['owner'],
            'tenant'
        ])->findOrFail($id);
        return view('admin.contracts.show', compact('contract'));
    }
}
