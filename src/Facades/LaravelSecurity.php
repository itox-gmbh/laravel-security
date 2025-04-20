<?php

namespace IToXGmbH\LaravelSecurity\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IToXGmbH\LaravelSecurity\LaravelSecurity
 */
class LaravelSecurity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \IToXGmbH\LaravelSecurity\LaravelSecurity::class;
    }
}
