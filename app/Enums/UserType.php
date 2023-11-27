<?php

namespace App\Enums;

enum UserType: string
{
    case Owner = "owner";
    case Technician = "technician";
    case Manager = "manager";
}
