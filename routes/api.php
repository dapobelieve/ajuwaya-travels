<?php

use Illuminate\Http\Request;

Route::get('details/{route}', 'Booking\BookingController@feed');


//get booking details
Route::get('/book-details/{booking}','Booking\BookingController@bookFeed');

// admin payment
Route::post('/adminpay', 'Payment\PaymentController@redirecToPayStack');

// show bookings
Route::get('/book-view/{booking}', 'Booking\BookingController@confirmDetails');


// post users booking
Route::post('process', 'Booking\BookingController@store');

// update users booking
Route::post('update', 'Booking\BookingController@update');

// get booking details
Route::get('getpay/{booking}', 'Payment\PaymentController@index');

// goto payment gateway
Route::post('payment', 'Payment\PaymentController@redirecToPayStack');

//Payment Route
// Route::post('payment', 'Payment\PaymentController@pay');