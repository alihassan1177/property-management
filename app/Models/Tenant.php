<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tenant extends Model
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
