<?php

use App\Controllers\Api\V1\ProductController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group("api", function ($routes) {
    $routes->group("v1", ['namespace' => 'App\Controllers\Api\V1'], function ($routes) {
        $routes->resource('products', ['controller' => 'ProductController']);
    });
});
