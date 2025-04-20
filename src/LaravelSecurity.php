<?php

namespace IToXGmbH\LaravelSecurity;

use IToXGmbH\LaravelSecurity\Http\Middleware\ContentTypeMiddleware;
use IToXGmbH\LaravelSecurity\Http\Middleware\StrictTransportSecurityMiddleware;
use IToXGmbH\LaravelSecurity\Http\Middleware\XFrameOptionsMiddleware;

class LaravelSecurity
{
    private array $middleware = [
        ContentTypeMiddleware::class,
        StrictTransportSecurityMiddleware::class,
        XFrameOptionsMiddleware::class,
    ];

    public function registerMiddleware(): array
    {
        return $this->middleware;
    }

    public function getSecurityText(): string
    {
        return 'Contact: https://hackerone.com/ed
Expires: 2026-03-27T00:00:00.000Z
Acknowledgments: https://hackerone.com/ed/thanks
Preferred-Languages: en, fr, de
Canonical: https://securitytxt.org/.well-known/security.txt
Policy: https://hackerone.com/ed?type=team&view_policy=true';

    }
}
