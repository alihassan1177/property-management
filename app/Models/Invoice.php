<?php

namespace App\Models;

use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = '#INC';
            $latestId = static::max('id');
            $nextId = $latestId + 1;
            $model->invoice_no = $prefix . str_pad($nextId, 3, '0', STR_PAD_LEFT);

            $model->status = InvoiceStatus::Sent;
        });
    }

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

    function invoice_category()  {
        return $this->hasOne(InvoiceCategory::class, "invoice_category_id", "id");
    }

    function tenant() {
        return $this->hasOne(Tenant::class, "tenant_id", "id");
    }

    function property() {
        return $this->hasOne(Property::class, "property_id", "id");
    }

    function getDueAmountAttribute() {
        if ($this->paid_amount) {
            return $this->total_amount - $this->paid_amount;
        }
        return $this->total_amount;
    }

    function getFormattedStatusAttribute() {
        return strtoupper(str_replace("_", "", $this->status));        
    }

}
