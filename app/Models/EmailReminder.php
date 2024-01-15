<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        "reminder_date",
        "name",
        "email",
        "reminder_sent",
        "message"
    ];
}
