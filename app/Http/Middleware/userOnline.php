<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Carbon\Carbon;
use Cache;
use Auth;

class userOnline
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
        if(Auth::check())
        {
            $UserOnlineExpiredTime = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-'. Auth::user()->id, true, $UserOnlineExpiredTime);
            Auth::user()->status = 1;
            Auth::user()->save();
        }
        return $next($request);
    }
}
