<?php

namespace App\Http\Middleware;

use Closure;
use session;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if(session()->get('locale')) {
            App::setLocale(session('locale'));
        }

        return $next($request);
    }
}
