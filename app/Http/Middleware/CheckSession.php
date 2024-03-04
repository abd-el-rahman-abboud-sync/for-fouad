<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSession
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
        // Check if the session contains 'admin_id'
        if ($request->session()->has('admin_id')) {
            // If session exists, proceed with the request
            return $next($request);
        }

        // If session does not exist, redirect to the login page
        return redirect('/');
    }
}
