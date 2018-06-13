<?php

namespace App\Listeners;

use Mail;
use App\Mail\RouteAlert;
use App\Events\NewBooking;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Booking\Route;
use Illuminate\Support\Facades\DB;

class NewBookingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewBooking  $event
     * @return void
     */
    public function handle(NewBooking $event)
    {
        /**
         * get the count of all bookings that 
         * belong to the route
         * 
         * @var int
         */
        $sum = DB::table('bookings')
                            ->select(DB::raw('sum(seat_num) as times'))
                            ->where([
                                ['route_id', $event->route->id],
                                ['pay_status', '=', '1']
                            ])
                            ->first();
        $bookTimes = (int) $sum->times;

        $emails = [
            'yemialabipurpose@gmail.com',
            'tolulopeakinpelu1@gmail.com',
            'dredsn@gmail.com',
            'adeyemi@ajuwayatravel.com'
        ];

        Mail::to($emails)
                ->send(new RouteAlert($event->route));

        /**
         * Update the route concerned
         */
        if ($bookTimes >= $event->route->bus_type){
            $event->route->update([
                'active' => 0
            ]);

            // dd($bookTimes);

            // send a mail here
            // try {
            //     Mail::to('dapomichaels@gmail.com')
            //     ->cc('dredsn@gmail.com')
            //     ->send(new RouteAlert($event->route));
            // }catch (Exception $e)
            // {
            //     return redirect()->route('home')->with('', 'Couldn\'t send mail, No internet connection');
            // }
        }       
    }
}
