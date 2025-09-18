<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Kasir;
use App\Http\Middleware\Pimpinan;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(
            [
                'Admin' => Admin::class,
            ]
        );
    })
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(
            [
                'Kasir' => Kasir::class,
            ]
        );
    })
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(
            [
                'Pimpinan' => Pimpinan::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
