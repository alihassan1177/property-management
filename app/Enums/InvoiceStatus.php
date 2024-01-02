<?php

namespace App\Enums;

enum InvoiceStatus : string {
    case Paid = "paid";
    case PartiallyPaid = "partialy_paid";
    case Draft = "draft";
    case Sent = "sent";
    case Declined = "declined";
    case Due = "due";
}