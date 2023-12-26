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
        'tenant_id',
        "manager_id",
        "terms_of_agreement",
        "energy_performance_certificate",
        "living_area",
        "inventory_report",
        "electricity_information",
        "gas_information",
        "water_information",
        "internet_information",
        "key_information",
        "additional_notes"
    ];

    function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }
}
