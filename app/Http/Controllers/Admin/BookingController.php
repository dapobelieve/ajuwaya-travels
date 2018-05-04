<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Booking\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::get();
        // dd($bookings);
        return view('admin.booking.bookings')->with('bookings', $bookings);
    }
}
