<?php

use App\Http\Middleware\Test;
use App\Http\Middleware\ValidUser;
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
            'isValid' =>ValidUser::class,
            'test'=>Test::class
        ]);

        $middleware->appendToGroup('ok-user',[
            ValidUser::class,
            Test::class
        ]);

        // $middleware->append(Test::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
