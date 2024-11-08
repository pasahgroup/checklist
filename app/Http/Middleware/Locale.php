<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use Illuminate\Support\Facades\Session;
class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          //$locale = request()->getLocale();
          // $auth_user=Auth::user();
          // $auth_user=user::where('status','Active')->get();           
           $auth_user = Auth::user();

         // dd($auth_user);
         // app()->setLocale($auth_user);
//dd($request->session());

        session([
            "auth_user" => $auth_user,
            //"current-country" => geoip(request()->ip())->iso_code,
        ]);

        return $next($request);

        //return $next($request);
    }
}
