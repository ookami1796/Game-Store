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

// Payment
$router->get('payment', 'PaymentController@index');
$router->post('payment', 'PaymentController@store');
$router->get('payment/{id}', 'PaymentController@show');
$router->put('payment/{id}', 'PaymentController@update');
$router->delete('payment/{id}', 'PaymentController@destroy');

//Pengiriman
$router->get('pengiriman', 'PengirimanController@index');
$router->post('pengiriman', 'PengirimanController@store');
$router->get('pengiriman/{id}', 'PengirimanController@show');
$router->put('pengiriman/{id}', 'PengirimanController@update');
$router->delete('pengiriman/{id}', 'PengirimanController@destroy');

//User
$router->get('user', 'UserController@index');
$router->post('user', 'UserController@store');
$router->get('user/{id}', 'UserController@show');
$router->put('user/{id}', 'UserController@update');
$router->delete('user/{id}', 'UserController@destroy');

//Product
$router->get('product', 'ProductController@index');
$router->post('product', 'ProductController@store');
$router->get('product/{id}', 'ProductController@show');
$router->put('product/{id}', 'ProductController@update');
$router->delete('product/{id}', 'ProductController@destroy');

//Troli
$router->get('troli', 'TroliController@index');
$router->post('troli', 'TroliController@store');
$router->get('troli/{id}', 'TroliController@show');
$router->put('troli/{id}', 'TroliController@update');
$router->delete('troli/{id}', 'TroliController@destroy');

$router->get('product', 'ProductController@index');
$router->get('troli', 'TroliController@index');