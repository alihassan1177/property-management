<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        "address",
        "cadastral_number",
        "number_of_beds",
        "number_of_baths",
        'total_area',
        'cadastral_number',
        'rental_period',
        'security_deposit',
        'floors',
        'rent_amount',
        'status',
        'owner_id',
        'tenant_id'
    ];

    function owner() {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
