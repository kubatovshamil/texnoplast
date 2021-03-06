<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if(Auth::check())
        {
            if(Auth::user()->isAdmin())
            {
                return $next($request);
            }
            if(Auth::user()->isUser())
            {
                return redirect("/admin");
            }
        }else{
            return response()->view('admin.pages.login');
        }

        return redirect('/admin');
    }
}
