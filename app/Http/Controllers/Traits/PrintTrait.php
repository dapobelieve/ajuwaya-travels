<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use App\Models\Booking\Booking;

trait PrintTrait 
{

    public function Printer(Booking $booking)
    {
        if($booking->pay_status){
            return true;
        }else {
            return false;
        }
    }

}