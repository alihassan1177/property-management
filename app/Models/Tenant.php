<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenant extends Authenticatable
{
    use HasFactory, Notifiable;

    public static $rules = [];

    protected $fillable = [
        "name",
        "address",
        "move_in_date",
        "move_out_date",
        "status",
        "email",
        "phone",
        "property_id",
        "password"
    ];

    function property() {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
}
