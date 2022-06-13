<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Role;


Route::group([
    'middleware' => ['api', 'guest'],
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
});

Route::group([
    'middleware' => ['guest']

], function () {
    //Rutas a las que se permitirá acceso
    Route::post('contactForm/add', [ContactFormController::class, 'store']);

        
    Route::get('getUsers', 'UserController@getUsers');
    Route::patch('user/edit/{id}', 'UserController@editUser');
    Route::patch('user/promoteToAdmin/{id}', 'UserController@promoteToAdmin');

    Route::get('getRoles', 'Role@getRoles');

    Route::post('product', 'ProductController@product');
    Route::get('showProducts', 'ProductController@showProducts');
    Route::get('products/{id}', 'ProductController@getProduct');
    Route::delete('products/{id}', 'ProductController@deleteProduct');
    Route::put('setData/{id}', 'ProductController@setData');

    Route::post('cliente/add', 'CustomerController@createCustomer');

    Route::get('dropDownShow', 'ProductCategoryController@dropDownShow');

    Route::post('order/add', 'OrderController@createOrder');
    Route::get('order/latest', 'OrderController@getLatestOrder');

    Route::get('getInvoiceRows', 'InvoiceRowController@getInvoiceRows');
    Route::post('invoiceRow/add', 'InvoiceRowController@addInvoiceRow');
    Route::get('getUserInvoiceRows/{id}', 'InvoiceRowController@getUserInvoiceRows');
});


