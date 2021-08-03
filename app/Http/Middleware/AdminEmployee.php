<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\LoginController;
use Closure;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminEmployee
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
        //dd('hello');
        if(Auth::user()->is_admin == 0){
            Auth::logout();
            return redirect(route('login'))->with('notauth',__('alert.notauth'));
        }
        return $next($request);
    }
}
