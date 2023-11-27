<?php

namespace App\Enums;

enum UserType{
    case Owner;
    case Technician;
    case Manager;
}