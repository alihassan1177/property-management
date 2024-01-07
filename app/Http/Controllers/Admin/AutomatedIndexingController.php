<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AutomatedIndexing;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Traits\ResultNotification;

class AutomatedIndexingController extends Controller
{

    use ResultNotification;

    function index_docs()
    {
        if ($this->index_invoices()) {
            $this->successNotification("Invoices Indexed Successfully");
        }else{
            $this->errorNotification("Failed to index invoices");
        }

        return back();
    }


    private function index_invoices()
    {
        $invoices = Invoice::with('invoice_payments')->get();
        $automated_indexing = AutomatedIndexing::latest()->first();
        $undindexed_invoice_payments = [];

        foreach ($invoices as $invoice) {
            foreach ($invoice->invoice_payments as $invoice_payment) {
                if (!is_null($automated_indexing)) {
                    if (\Carbon\Carbon::parse($invoice_payment->created_at)->gt($automated_indexing->created_at)) {
                        $undindexed_invoice_payments[] = [
                            'invoice' => $invoice,
                            'invoice_payment' => $invoice_payment
                        ];
                    }
                } else {
                    $undindexed_invoice_payments[] = [
                        'invoice' => $invoice,
                        'invoice_payment' => $invoice_payment
                    ];
                }
            }
        }

        // dd($undindexed_invoice_payments);

        $new_indexings = [];

        foreach ($undindexed_invoice_payments as $unindexed_payment) {
            $new_indexings[] = [
                "invoice_id" => $unindexed_payment["invoice"]->id,
                "document_name" => $unindexed_payment["invoice"]->invoice_category_id == null ? "RENT INVOICE PAYMENT" : "INVOICE PAYMENT",
                "document_type" => "PAYMENT",
                "document_content" => "PAYMENT AMOUNT : " . $unindexed_payment["invoice_payment"]->amount,
                "document_date" => $unindexed_payment["invoice_payment"]->created_at,
                "created_at" => now(),
                "updated_at" => now()
            ];
        }

        $result = false;

        if (count($new_indexings)) {
            // dd($new_indexings);
            $result = AutomatedIndexing::insert($new_indexings);
        }

        return $result;
    }
}
