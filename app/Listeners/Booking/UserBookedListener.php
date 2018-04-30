<?php

namespace App\Listeners\Booking;


use Mail;
use App\Events\UserBooked;
use App\Mail\BookingDetails;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserBookedListener
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
     * @param  UserBooked  $event
     * @return void
     */
    public function handle(UserBooked $event)
    {
        Mail::to($event->booking->email)->send(new BookingDetails($event->booking));

    }
}
