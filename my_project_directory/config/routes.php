<?php

// config/routes.php
use App\Controller\BlogApiController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('api_post_show', '/api/posts/{id}')
        ->controller([BlogApiController::class, 'show'])
        ->methods(['GET', 'HEAD'])
    ;
    $routes->add('api_post_edit', '/api/posts/{id}')
        ->controller([BlogApiController::class, 'edit'])
        ->methods(['PUT'])
    ;
};

return function (RoutingConfigurator $routes) {
    $routes->add('contact', '/contact')
        ->controller([contactController::class, 'contact'])
        ->condition('context.getMethod() in ["GET", "HEAD"] and request.headers.get("User-Agent") matches "/firefox/i"')
        // expressions can also include configuration parameters:
        // ->condition('request.headers.get("User-Agent") matches "%app.allowed_browsers%"')
        // expressions can even use environment variables:
        // ->condition('context.getHost() == env("APP_MAIN_HOST")')
    ;
    $routes->add('post_show', '/posts/{id}')
        ->controller([postController::class, 'showPost'])
        // expressions can retrieve route parameter values using the "params" variable
        ->condition('params["id"] < 1000')
    ;
};