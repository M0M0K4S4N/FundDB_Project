<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

$router->get('/', 'IndexController@index');
$router->get('/register', 'CustomerController@register');
$router->post('/register', 'CustomerController@store_register_data');


$router->get('/posts', 'PostController@index');
$router->get('/posts/{id}', 'PostController@view');
