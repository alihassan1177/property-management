<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait ResultNotification
{

    function successNotification($message)
    {
        Session::flash('success', $message);
    }

    function errorNotification($message)
    {
        Session::flash('error', $message);
    }
}
