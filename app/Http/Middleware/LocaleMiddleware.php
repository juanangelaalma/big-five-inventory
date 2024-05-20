<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $localeCookie = $request->cookie('locale');
        $decryptedLocaleCookie = $localeCookie ? Crypt::decryptString($localeCookie) : '|';

        $locale = explode('|', $decryptedLocaleCookie)[1];

        App::setLocale($locale);

        return $next($request);
    }
}
