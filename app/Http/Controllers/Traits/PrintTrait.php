<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use App\Models\Booking\Booking;

trait PrintTrait 
{

    public function Printer(Booking $booking)
    {
        return $booking->pay_status ? true : false;
    }

}