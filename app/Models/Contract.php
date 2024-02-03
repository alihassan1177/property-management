<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        "tenant_id",
        "property_id",
        "late_fee_amount",
        "early_termination_fee_amount",
        "start_date",
        "end_date",
        "status",
        "rent_amount",
        "security_deposit",
        'document',
        'contract_id',
        'gas_information',
        'water_information',
        'internet_information',
        'electricity_information'
    ];


    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $lastId = static::latest()->value('id');
            $newId = $lastId ? $lastId + 1 : 1;
            $formattedId = 'CONTRACT_' . str_pad($newId, 4, '0', STR_PAD_LEFT);
            $model->contract_id = $formattedId;
        });

        static::created(function () {
            info("CONTRACT CREATED");
        });

    }

    function tenant()
    {
        return $this->belongsTo(AddressBook::class, "tenant_id", "id");
    }

    function property()
    {
        return $this->belongsTo(Property::class, "property_id", "id");
    }
}
