<?php

namespace App\Http\Middleware;

use Closure;

class Tracker
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
        $tracker = new \App\Tracker();
        if (class_exists(\Auth::class)) {
            $tracker->user_id = \Auth::id();
        }

        $tracker->path = $request->path();
        $tracker->route = $request->route()->getName();
        $tracker->parameters = $request->route()->parameters;
        $tracker->method = $request->method();
        $tracker->ip_address = $request->ip();
        $tracker->agent = $_SERVER['HTTP_USER_AGENT'];

        $tracker->save();

        return $next($request);
    }
}
