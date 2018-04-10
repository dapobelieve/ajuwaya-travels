<?php

use Illuminate\Http\Request;

Route::get('details/{route}', 'Booking\BookingController@feed');


// post users booking
Route::post('process', 'Booking\BookingController@store');