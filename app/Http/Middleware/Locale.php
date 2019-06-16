<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = session('lang', \Config::get('app.locale'));
        if ($lang and Language::find($lang)) {
            app()->setLocale($lang);
        }

        return $next($request);
    }
}
