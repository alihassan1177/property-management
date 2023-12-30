<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyDate extends Model
{
    use HasFactory;

    protected $fillable = [
        "tenant_id",
        "property_id",
        "key_date_description",
        "key_date",
        "reminder_date"
    ];
}
