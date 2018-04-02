<?php

// Route::get('/')

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/book', function () {
    return view('pages.main');
});

