<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvoiceCategory;
use App\Traits\ResultNotification;

class InvoiceCategoryController extends Controller
{
    use ResultNotification;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounting.invoice-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|max:200'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            InvoiceCategory::create($validator->validated());
            $this->successNotification("Invoice Category created successfully");
        } catch (\Exception $e) {
            $this->errorNotification("Something went wrong, please try again later");
            info("ERROR : " . $e->getMessage());
        }

        return redirect()->route('admin.accounting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice_category = InvoiceCategory::with('invoices')->findOrFail($id);
        return view('admin.accounting.invoice-categories.show', compact('invoice_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice_category = InvoiceCategory::findOrFail($id);
        return view('admin.accounting.invoice-categories.edit', compact('invoice_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice_category = InvoiceCategory::findOrFail($id);

        $validator = validator()->make($request->all(), [
            'name' => 'required|max:200'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $invoice_category->update($validator->validated());
            $this->successNotification("Invoice category updated successfully");
        } catch (\Exception $e) {
            info("ERROR : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $invoice_category = InvoiceCategory::with('invoices')->findOrFail($id);

        try {
            if (!count($invoice_category->invoices) ) {
                $invoice_category->delete();
                $this->successNotification("Invoice Category Deleted Successfully");
            }else{
                $this->errorNotification("Invoice Category cannot be deleted");
            }
        } catch (\Exception $e) {
            info("ERROR : " . $e->getMessage());
            $this->errorNotification("Something went wrong, please try again later");
        }

        return redirect()->route('admin.accounting.index');
    }

}
