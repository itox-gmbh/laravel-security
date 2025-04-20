<?php

namespace IToXGmbH\LaravelSecurity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
class ContentTypeMiddleware
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
            $response->headers->set(
                'X-Content-Type-Options',
                'nosniff',
                true
            );
        }

        return $response;
    }
}
