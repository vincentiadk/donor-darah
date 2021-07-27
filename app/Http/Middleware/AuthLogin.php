<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('id') && session()->has('last_login')) {
            if (session()->get('last_login') != User::find(session()->get('id'))->last_login) {
                session()->flush();
                return redirect('/login');
            }
            return $next($request);
        }
        session()->flush();
        return redirect('/login');
    }
}
