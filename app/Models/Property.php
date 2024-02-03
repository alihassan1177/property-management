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
        "additional_notes",
        "country_id"
    ];

    function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    function owner()
    {
        return $this->belongsTo(AddressBook::class, 'owner_id', 'id');
    }

    function manager()
    {
        return $this->belongsTo(AddressBook::class, 'manager_id', 'id');
    }

    function tenant()
    {
        return $this->belongsTo(AddressBook::class, 'tenant_id', 'id');
    }

    function invoices() {
        return $this->hasMany(Invoice::class, 'property_id', 'id');
    }

    function getTotalRentAmountAttribute()
    {
        $total = $this->rent_amount;

        if (isset($this->electricity_information) && $this->electricity_information) {
            $electricity_info = unserialize($this->electricity_information);
            $total += $electricity_info["price"] ?? 0;
        }

        if (isset($this->gas_information) && $this->gas_information) {
            $gas_info = unserialize($this->gas_information);
            $total += $gas_info["price"] ?? 0;
        }

        if (isset($this->water_information) && $this->water_information) {
            $water_info = unserialize($this->water_information);
            $total += $water_info["price"] ?? 0;
        }

        if (isset($this->internet_information) && $this->internet_information) {
            $internet_info = unserialize($this->internet_information);
            $total += $internet_info["price"] ?? 0;
        }

        // if (isset($this->country) && isset($this->country->vat_rate) && $this->country->vat_rate) {
        //     if ($this->country->vat_rate->vat_rates == 0) {
        //         return $total;
        //     }

        //     $percent_value = ($this->country->vat_rate->vat_rates / 100) * $total;
        //     return intval($total + $percent_value);
        // }

        return $total;
    }
}
