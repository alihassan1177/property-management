<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "address"
    ];

    function getFormatedNameAttribute() {
        return implode(",", json_decode($this->name));
    }

    function getFormatedEmailAttribute() {
        return implode(",", json_decode($this->email));        
    }

    function getFormatedPhoneAttribute() {
        return implode(",", json_decode($this->phone));        
    }
}
