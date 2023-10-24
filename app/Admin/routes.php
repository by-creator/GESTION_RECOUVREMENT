<?php

use Illuminate\Routing\Router;
use OpenAdmin\Admin\Facades\Admin;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('functions', FunctionsController::class);
    $router->resource('users', UserController::class);
    $router->resource('states', StateController::class);
    $router->resource('invoices', InvoiceController::class);
    $router->resource('months', MonthController::class);

});
