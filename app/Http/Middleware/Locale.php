<?php

namespace App\Http\Middleware;

use App\Currency;
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
        app()->setLocale($lang);

        $currencies = \Cache::rememberForever("app.currencies", function () {
            return Currency::get();
        });
        $lang_currency = $currencies->firstWhere('language_id', $lang);
        $user_currency = session('currency', $lang_currency->key);
        \Config::set('app.current_currency', $currencies->firstWhere('key', $user_currency));


        view()->share(compact('currencies'));

        \Config::set('app.currency', $user_currency);

        return $next($request);
    }
}
