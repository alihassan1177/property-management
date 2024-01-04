<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentFollowUp extends Model
{
    use HasFactory;

    protected $fillable = [
        "invoice_id",
        "notes"
    ];

    function invoice() {
        return $this->hasOne(Invoice::class, "id", "invoice_id");
    }
}
