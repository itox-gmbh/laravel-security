<?php

namespace IToXGmbH\LaravelSecurity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use IToXGmbH\LaravelSecurity\Facades\LaravelSecurity;
use Symfony\Component\HttpFoundation\Response;

class SecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!App::environment('local')) {
            $headers = LaravelSecurity::getHeaders();

            foreach ($headers as $key => $value) {
                $response->headers->set($key, $value, true);
            }

            foreach (LaravelSecurity::removeHeaders() as $key) {
                header_remove($key);
            }

        }

        return $response;
    }
}
