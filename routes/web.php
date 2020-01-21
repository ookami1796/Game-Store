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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
// Category
$router->get('category', 'CategoryController@index');
$router->post('category', 'CategoryController@store');
$router->get('category/{id}', 'CategoryController@show');
$router->put('category/{id}', 'CategoryController@update');
$router->delete('category/{id}', 'CategoryController@destroy');

// Checkout
$router->get('checkout', 'CheckoutController@index');
$router->post('checkout', 'CheckoutController@store');
$router->get('checkout/{id}', 'CheckoutController@show');
$router->put('checkout/{id}', 'CheckoutController@update');
$router->delete('checkout/{id}', 'CheckoutController@destroy');

$router->get('product', 'ProductController@index');
$router->get('payment', 'PaymentController@index');
$router->get('pengiriman', 'PengirimanController@index');
$router->get('user', 'UserController@index');
$router->get('troli', 'TroliController@index');