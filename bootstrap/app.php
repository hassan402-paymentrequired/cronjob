<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web/web.php',
        api: __DIR__.'/../routes/api/api.php',
        commands: __DIR__.'/../routes/console/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(fn (ModelNotFoundException $e, Request $request)  => response()->json(['message' => 'Record not found.'], 404));
        $exceptions->render(fn (MethodNotAllowedHttpException $e, Request $request)  => response()->json(['message' => 'the method is not allow'], 405));
        $exceptions->render(fn (QueryException $e, Request $request)  => response()->json(['message' => $e->getMessage()], 400));
        $exceptions->render(fn (NotFoundHttpException $e, Request $request)  => response()->json(['message' => $e->getMessage()], 404));
        $exceptions->render(fn (ValidationException $e, Request $request)  => response()->json(['message' => $e->getMessage()], 400));
    })->create();
