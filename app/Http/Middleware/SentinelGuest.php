<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelGuest
{
    //use TranslationHelper;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::check()) {
            if ($request->ajax()) {
                //$message = $this->translate('unauthorized', 'Unauthorized');
                return response()->json(['error' =>  'Unauthorized'], 401);
            } else {
              // ako ima ulogu administrator redirectaj na posebnu stranicu
                if(Sentinel::check() && Sentinel::inRole('administrator')) {
                  return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('home');
                  }
            }
        }

        return $next($request);
    }
}
