<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Boat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->accountsType === 'Admin') {
            return redirect('/dashboard');
        }
        if ($request->user()->accountsType=== 'Boat') {
            return $next($request);
        }
        if ($request->user()->accountsType === 'Fisherman') {
            return redirect('/fishermandashboard');
        }
        abort(401);
    }
}
