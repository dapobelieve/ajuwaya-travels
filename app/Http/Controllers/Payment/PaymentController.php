<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Booking\Booking;

class PaymentController extends Controller
{
    public function index(Request $request, Booking $booking)
    {
        return $booking->route;
    }



    public function pay()
    {
        // return $booking;
    }

}
