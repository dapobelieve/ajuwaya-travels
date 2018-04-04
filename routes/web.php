<?php

// Route::get('/')

Route::get('/','HomeController@index' )->name('home');

// Register Page
Route::get('/register','Auth\AuthController@getRegister')->name('auth.register')->middleware('guest');
Route::post('/register','Auth\AuthController@postRegister')->name('auth.register');

// Login Page
Route::get('/login','Auth\AuthController@getLogin')->name('auth.login')->middleware('guest');

// Confirm Email Route
Route::get('/confirm/{token}','Emails\Confirm@getEmailToken')->name('email.token');





Route::get('/book', function () {
    return view('pages.main');
});

