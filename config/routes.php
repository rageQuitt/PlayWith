<?php

// config/routes.php
use App\Controller\BlogApiController;
use App\Controller\BlogController;
use App\Controller\ContactController;
use App\Controller\PostController;
use App\Controller\ProductController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('api_post_show', '/api/posts/{id}')
        ->controller([BlogApiController::class, 'show'])
        ->methods(['GET', 'HEAD']);

    $routes->add('api_post_edit', '/api/posts/{id}')
        ->controller([BlogApiController::class, 'edit'])
        ->methods(['PUT']);

    $routes->add('contact', '/contact')
        ->controller([ContactController::class, 'contact'])
        ->condition('context.getMethod() in ["GET", "HEAD"] and request.headers.get("User-Agent") matches "/firefox/i"');

    $routes->add('post_show', '/posts/{id}')
        ->controller([PostController::class, 'showPost'])
        ->condition('params["id"] < 1000');

    $routes->add('app_blog', '/blog')
        ->controller([BlogController::class, 'index']);
    
    $routes->add('app_blog_article', '/blog/article/{id}')
        ->controller([BlogController::class, 'article'])
        ->methods(['GET', 'HEAD']);
    
    $routes->add('add_to_cart', '/ajouter-au-panier/{id}')
        ->controller([ProductController::class, 'addToCart'])
        ->methods(['POST']);
};
