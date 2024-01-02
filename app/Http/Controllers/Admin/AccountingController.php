<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceCategory;
use App\Models\VatRate;
use App\Models\Invoice;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    function index() {
        $vat_rates = VatRate::latest()->paginate(config('app.per_page_items'), ["*"], "vat_rates");
        $invoice_categories = InvoiceCategory::latest()->paginate(config('app.per_page_items'), ['*'], "invoice_categories");
        $invoices = Invoice::latest()->paginate(config('app.per_page_items'), ['*'], "invoices");
        return view('admin.accounting.index', compact('vat_rates', 'invoice_categories', 'invoices'));
    }

}
