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
        'eletricity_information'
    ];
}
