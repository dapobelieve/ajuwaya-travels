<?php

// Route::get('/')

Route::get('/','HomeController@index' )->name('home');


// Register Page
Route::get('/register','Auth\AuthController@getRegister')->name('auth.register')->middleware('guest');
Route::post('/register','Auth\AuthController@postRegister')->name('auth.register');

// Login Page
Route::get('/login','Auth\AuthController@getLogin')->name('auth.login');
Route::post('/login','Auth\AuthController@postLogin')->name('auth.login');

Route::get('signout', [
    'uses' => 'Auth\AuthController@getSignout',
    'as'  =>  'auth.signout'
    ]);

// Confirm Email Route
Route::get('/confirm/{token}','Emails\Confirm@getEmailToken')->name('email.token');

// Search Results
Route::get('/results', 'HomeController@results')->name('route.search');

Route::get('/book/{route}', 'Booking\BookingController@index')->name('book.start');




// Admin  Routes

// load the routes page as the first
Route::get('admin', 'Admin\PageController@home')->name('index-routes');









