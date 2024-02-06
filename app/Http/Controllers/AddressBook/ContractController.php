<?php

namespace App\Http\Controllers\AddressBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{

    function index()
    {
        $user = auth('address_book')->user();
        $contracts = Contract::with(
            [
                'property' => ['owner'],
                'tenant'
            ]
        )->where('tenant_id', $user->id)->orWhereHas('property', function ($query) use ($user) {
            $query->where('owner_id', $user->id);
        })->latest()->paginate();

        return view('address-book.contracts.index', compact('contracts'));
    }

    function show($id)
    {
        $user = auth('address_book')->user();
        $contract = Contract::with([
            'property' => ['owner'],
            'tenant'
        ])->where('tenant_id', $user->id)->orWhereHas('property', function ($query) use ($user) {
            $query->where('owner_id', $user->id);
        })->findOrFail($id);

        return view('address-book.contracts.show', compact('contract'));
    }
}
