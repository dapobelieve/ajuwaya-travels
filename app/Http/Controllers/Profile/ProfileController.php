<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Booking\Route;
use App\Models\Booking\Booking;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified_user']);
    }

    public function index()
    {
        $bookings = Auth()->user()->bookings()->with('route')->get();
        return view('pages.profile')->with('bookings', $bookings);
    }
}
