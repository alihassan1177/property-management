<?php

namespace App\Http\Controllers\AddressBook;

use App\Http\Controllers\Controller;
use App\Models\KeyDate;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;

class KeyDateController extends Controller
{

    use ResultNotification;

    function index()
    {   
        $user = auth('address_book')->user();
        $keydates = KeyDate::where('tenant_id', $user->id)->latest()->paginate(config('app.per_page_items'));
        return view('address-book.keydates.index', compact('keydates'));
    }

    function show($id){
        $keydate = KeyDate::findOrFail($id);
        return view('address-book.keydates.show', compact('keydate'));
    }

}
