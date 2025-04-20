<?php

namespace IToXGmbH\LaravelSecurity\Http\Controllers;

use IToXGmbH\LaravelSecurity\Facades\LaravelSecurity;

class SecurityTextController
{

    public function __invoke()
    {
        return response(LaravelSecurity::getSecurityText(), 200)
            ->header('Content-Type', 'text/plain');
    }
}
