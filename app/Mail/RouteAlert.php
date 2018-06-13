<?php

namespace App\Mail;

use App\Models\Booking\Route;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RouteAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $route;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@ajuwayatravel.com','AjuwayaTravel')
                    ->subject('Route Deactivation Alert')
                    ->view('Mail.routealert');
    }
}
