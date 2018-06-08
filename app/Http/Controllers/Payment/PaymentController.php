<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Models\Booking\Booking;

use App\Events\UserBooked;
use App\Events\NewBooking;

class PaymentController extends Controller
{
    public function index(Request $request, Booking $booking)
    {
        $amount = $booking->seat_num * $booking->route->price;
        $format = number_format($amount);
        $psKey  = config('paystack.publicKey');
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

    private function verify($ref)
    {
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
            $url = "https://api.paystack.co/transaction/verify/{$ref}";
            // curl things
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt(
              $ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer '.Config::get('paystack.secretKey') ]
            );
            $request = curl_exec($ch);
            curl_close($ch);
            // curl things ends

            if ($request) {
            $result = json_decode($request, true);
            // print_r($result);
            if($result){
                // return response()->json($result, 200);
              if($result['data']){
                //something came in
                if($result['data']['status'] == 'success'){
                    // fire event
                    return true;
                  
                  // echo "Transaction was successful";
                }else{

                    return $result['data']['gateway_response'];                  // the transaction was not successful, do not deliver value'
                  // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
                  // echo "Transaction was not successful: Last gateway response was: ".;
                }
              }else{
                 // false;
                return $result['message'];
              }

            }else{
                return false;
              //print_r($result);
              die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
            }
          }else{
            //var_dump($request);
            die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
          }
    }

    private function updateBooking($ref)
    {
        Booking::with('route')->where('bk_ref', $ref)->update([
            'pay_status' => 1
        ]);

        $booking = Booking::with('route')->where('bk_ref', $ref)->first();

        // fire event to send mail with booking details
        event(new UserBooked($booking));

        /*
        * fire an event to update
        * the route this booking 
        * belongs to based on number of seats thats been booked
        */
        event(new NewBooking($booking->route));

        return $booking;
    }



    public function redirecToPayStack(Request $request)
    {
        // if admin dont verify
        if ($request->admin) {
            $booking = $this->updateBooking($request->ref);

            return response()->json($booking, 200);
        }else {
            // verify transaction
            if($this->verify($request->ref)){
                // update booking record
                $booking = $this->updateBooking($request->ref);
                
                return response()->json($booking, 200);
            }else{
                return response()->json('Server Error, Please try again later', 500);
            }
        }
    }

    public function adminPay(Request $request)
    {
        if ($request->admin) {
            return response()->json($request, 200);
        }

        Booking::with('route')->where('bk_ref', $request->ref)->update([
            'pay_status' => 1
        ]);

        $booking = Booking::with('route')->where('bk_ref', $request->ref)->first();



        dd($request->ref);
    }
}
