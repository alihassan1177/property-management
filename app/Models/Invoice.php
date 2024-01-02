<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        "invoice_no",
        "invoice_category_id",
        "tenant_id",
        "property_id",
        "issue_date",
        "due_date",
        "total_amount",
        "paid_amount",
        "tax_percentage",
        "products",
        "status",
        "notes"
    ];
}
