<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->usertype==='admin') {
            return $next($request);
         }
         if ($request->user()->usertype==='boat') {
             return redirect('/boatdashboard');
         }
         if ($request->user()->usertype==='fisherman') {
             return redirect('/fishermandashboard');
         }
         abort(401);
    }
}
