<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Booking\Booking;

use Paystack;

class PaymentController extends Controller
{
    public function index(Request $request, Booking $booking)
    {
        $amount = $booking->seat_num * $booking->route->price;
        $format = number_format($amount);
        $psKey  = config('paystack.secretKey');
        $email  = $booking->email;
        $ref    = $booking->bk_ref;

        return response()->json([
            'amount' => $amount,
            'psKey'  => $psKey,
            'format' => $format,
            'email'  => $email,
            'ref'    => $ref,
        ]);
    }



    public function redirecToPayStack(Request $request)
    {
        return $request;
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

}
