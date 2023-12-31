<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    function vat_rate() {
        return $this->hasOne(VatRate::class, "country_id", "id");
    }
}
