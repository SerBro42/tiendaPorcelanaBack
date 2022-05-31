<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Role;

Route::post('contactForm/add', [ContactFormController::class, 'store']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
});

Route::get('getRoles', 'Role@getRoles');

Route::post('product', 'ProductController@product');
Route::get('showProducts', 'ProductController@showProducts');
Route::get('products/{id}', 'ProductController@getProduct');
Route::delete('products/{id}', 'ProductController@deleteProduct');
Route::put('setQuantity/{id}', 'ProductController@setQuantity');

Route::post('cliente/add', 'CustomerController@createCustomer');

Route::get('dropDownShow', 'ProductCategoryController@dropDownShow');

Route::post('order/add', 'OrderController@createOrder');
Route::get('order/latest', 'OrderController@getLatestOrder');

Route::post('invoiceRow/add', 'InvoiceRowController@addInvoiceRow');
//Route::get('image/{filename}', 'ProductController@displayImage')->name('image.displayImage');