<?php

namespace IToXGmbH\LaravelSecurity\Tests;

use IToXGmbH\LaravelSecurity\LaravelSecurity;
use PHPUnit\Framework\TestCase;

class LaravelSecurityTest extends TestCase
{

    public function testRegisterMiddleware()
    {
        $this->assertIsArray([]);
    }

}
