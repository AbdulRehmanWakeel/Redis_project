<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\ProcessPayment;
use App\Jobs\SendWelcomeEmail;
Route::get('/', function () {

    return view('welcome');
});

Route::get('/job-queue', function () {
    // ProcessPayment::dispatch(100);
    SendWelcomeEmail::dispatch('abdulrehman786268@gmail.com', 'Abdul Rehman');
    return "Job dispatched to Redis queue!";
});