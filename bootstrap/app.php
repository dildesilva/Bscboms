<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Boat;
use App\Http\Middleware\Fisherman;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Admin'=>Admin::class,
            'Boat'=> Boat::class,
            'Fisherman'=>Fisherman::class,


           ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
