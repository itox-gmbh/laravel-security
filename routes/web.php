<?php

use Illuminate\Support\Facades\Route;
use IToXGmbH\LaravelSecurity\Facades\LaravelSecurity;
use IToXGmbH\LaravelSecurity\Http\Controllers\SecurityTextController;

if (LaravelSecurity::hasSecurityPolicy()) {
    Route::get(LaravelSecurity::getSecurityTextUrl(), SecurityTextController::class);
}
