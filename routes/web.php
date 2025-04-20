<?php

use Illuminate\Support\Facades\Route;
use IToXGmbH\LaravelSecurity\Http\Controllers\SecurityTextController;

Route::get('.well-known/security.txt', SecurityTextController::class);
