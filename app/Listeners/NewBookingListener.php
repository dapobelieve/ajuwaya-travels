<?php

namespace App\Listeners;

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
        if ($bookTimes >= $event->route->bus_type){
            $event->route->update([
                'active' => 0
            ]);
            // dd('Route set to Inactive');
        }       
    }
}
