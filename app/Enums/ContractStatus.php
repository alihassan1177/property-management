<?php

namespace App\Enums;

enum ContractStatus : string {
    case Expired = "expired";
    case Teminated = "terminated";
    case Valid = "valid";
}