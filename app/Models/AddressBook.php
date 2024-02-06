<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AddressBook extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "address",
        "group_id",
        "created_at"
    ];

    protected $hidden = [
        "password"
    ];
}
