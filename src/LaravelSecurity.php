<?php

namespace IToXGmbH\LaravelSecurity;

use Illuminate\Support\Facades\App;

class LaravelSecurity
{
    private array $headers = [];

    public function __construct() {}

    /**
     * determines if SSL should be enforced
     */
    public function isSSLEnforced(): bool
    {
        $config = config('security.enforceSSL', true);

        if ($config && App::environment(['production', 'staging']) && ! App::runningUnitTests()) {
            return true;
        }

        return false;
    }

    public function getSecurityTextUrl(): string
    {
        return '/.well-known/security.txt';
    }

    /**
     * determines if a security policy is set
     */
    public function hasSecurityPolicy(): bool
    {
        if (count(config('security.policy', [])) === 0) {
            return false;
        }

        return true;
    }

    public function getHeaders(): array
    {
        if ($this->isSSLEnforced()) {
            $this->headers['Content-Security-Policy'] = 'upgrade-insecure-requests';

            if (config('security.headers.hsts', true)) {
                $this->headers['Strict-Transport-Security'] = 'max-age=31536000; includeSubDomains; preload';
            }
        }

        if (config('security.headers.x-frame-options', true)) {
            $this->headers['X-Frame-Options'] = config('security.headers.x-frame-options', 'SAMEORIGIN');
        }

        if (config('security.headers.x-content-type-options', true)) {
            $this->headers['X-Content-Type-Options'] = config('security.headers.x-content-type-options', 'nosniff');
        }

        if (config('security.headers.x-xss-protection', true)) {
            $this->headers['X-XSS-Protection'] = config('security.headers.x-xss-protection', '1; mode=block');
        }

        if (config('security.headers.permissions-policy', true)) {
            $this->headers['Permissions-Policy'] = config('security.headers.permissions-policy', 'camera=(), microphone=(), geolocation=(), fullscreen=(self), payment=(), accelerometer=(), gyroscope=()');
        }

        if (config('security.headers.feature-policy', true)) {
            $this->headers['Feature-Policy'] = config('security.headers.feature-policy', "camera 'none'; microphone 'none'; geolocation 'none'; fullscreen 'none'; payment 'none'; accelerometer 'none'; gyroscope 'none';");
        }

        return $this->headers;
    }

    public function removeHeaders(): array
    {
        return [
            'X-Powered-By',
            'Server',
        ];
    }

    public function getSecurityText(): string
    {
        return 'Contact: '.config('security.policy.contact').'
Expires: 2026-03-27T00:00:00.000Z
Acknowledgments: https://hackerone.com/ed/thanks
Preferred-Languages: de
Canonical: '.config('app.url').$this->getSecurityTextUrl().'
Policy: https://hackerone.com/ed?type=team&view_policy=true';
    }
}
