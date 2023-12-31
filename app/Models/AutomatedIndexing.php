<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomatedIndexing extends Model
{
    use HasFactory;

    protected $fillable = [
        "tenant_id",
        "property_id",
        "invoice_id",
        "document_name",
        "document_type",
        "document_content",
        "document_date"
    ];

    function invoice() {
        return $this->hasOne(Invoice::class, "id", "invoice_id");
    }
}
