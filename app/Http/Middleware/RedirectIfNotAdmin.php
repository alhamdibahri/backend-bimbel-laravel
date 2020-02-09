<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class RedirectIfNotAdmin
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
        if(!(Auth::user()->level == 'Admin')){
            Session::flash('flash_message', 'Anda tidak punya akses masuk ke sistem !!');
            Auth::logout();
            return \redirect('login');
        }

        return $next($request);
    }
}
