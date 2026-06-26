<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        apiPrefix: 'v1',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        // 🚀 CORRECCIÓN CLOUD RUN: Confiar en todos los proxies para HTTPS
        $middleware->trustProxies(at: '*');
        
        $middleware->statefulApi();
        $middleware->alias([
            'checkRol' => App\Http\Middleware\VerificarRol::class, 
            'api.key' => \App\Http\Middleware\ValidateApiKey::class,
        ]);
    
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
