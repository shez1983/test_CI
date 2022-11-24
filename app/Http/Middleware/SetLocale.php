<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        app()->setLocale(session('locale', config('app.locale')));

        return $next($request);
    }
}
