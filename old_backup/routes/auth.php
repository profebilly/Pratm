<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Login routes would go here
});

Route::middleware('auth')->group(function () {
    // Logout route would go here
});
