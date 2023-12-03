<?php

namespace App\Enums;

enum TaskStatus : string{
    case Draft = "draft";    
    case Received = "received";
    case TakenBy = "taken_by";
    case WaitingForAdminApproval = "waiting_for_admin_approval";
    case WaitingForRequesterInfo = "waiting_for_requester_info";
    case WaitingForTakerInfo = "waiting_for_taker_info";
    case Completed = "completed";
}