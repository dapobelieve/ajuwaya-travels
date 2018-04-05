<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified_user', ['only' => [
            'index',
        ]]);
    }



    public function index()
    {
        return view('pages.main');
    }
}
