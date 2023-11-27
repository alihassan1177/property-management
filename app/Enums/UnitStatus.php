<?php

namespace App\Enums;

enum UnitStatus : string {
    case Available = 'available';
    case OnRent = 'on_rent';
    case NotAvailable = 'not_available';
}