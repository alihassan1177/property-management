<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ResultNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AddressBook;

class AddressBookController extends Controller
{

    use ResultNotification;

    function index()
    {
        $entries = AddressBook::latest()->paginate(config("app.per_page_items"));
        return view('admin.address-book.index', compact('entries'));
    }

    function create()
    {
        return view('admin.address-book.create');
    }

    function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required|max:50",
                "email" => "required|max:1000",
                "phone" => "required|max:1000",
                "address" => "required|max:1000"
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $validated['name'] = json_encode($this->separateMulitpleValues($validated["name"]));
        $validated['email'] = json_encode($this->separateMulitpleValues($validated["email"]));
        $validated['phone'] = json_encode($this->separateMulitpleValues($validated["phone"]));

        try {
            AddressBook::create($validated);
            $this->successNotification("Address Book Entry created successfully");
        } catch (\Exception $e) {
            info("ADDRESSBOOK CONTROLLER => STORE : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later.");
        }

        return redirect()->route('admin.address-book.index');
    }

    function show($id)
    {
        $entry = AddressBook::findOrFail($id);
        return view('admin.address-book.show', compact('entry'));
    }

    private function separateMulitpleValues($string, $separator = ",") {
        $array = explode($separator, $string);
        return $array;    
    }

}
