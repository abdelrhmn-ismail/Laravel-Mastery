<?php

use Illuminate\Support\Facades\Route;



// Route for the main domain
Route::domain('tenancy.test')->group(function () {
    Route::get('/', function () {
        return 'Welcome to the main domain!';
    });
});

// Route for app01 subdomain
Route::domain('app01.tenancy.test')->group(function () {
    Route::get('/', function () {
        return 'Welcome to App01!';
    });
});

// Route for app02 subdomain
Route::domain('app02.tenancy.test')->group(function () {
    Route::get('/', function () {
        return 'Welcome to App02!';
    });
});
