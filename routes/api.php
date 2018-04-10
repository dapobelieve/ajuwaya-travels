<?php

use Illuminate\Http\Request;

Route::get('details/{route}', 'Booking\BookingController@feed');


//get booking details
Route::get('/book-details/{bookRef}','Booking\BookingController@bookFeed');


// post users booking
Route::post('process', 'Booking\BookingController@store');