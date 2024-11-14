<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersControler;
use App\Http\Controllers\CustomerControler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders', [OrdersControler::class, 'list']);

Route::get('/orders/create', [OrdersControler::class, 'createForm']);
Route::post('/orders/create', [OrdersControler::class, 'create']);

Route::get('/orders/{id}', [OrdersControler::class, 'detail']);
Route::get('/customers/{id}/categories', [CustomerControler::class, 'categories']);
Route::get('/customers/{id}', [CustomerControler::class, 'show']);
Route::get('/customers/{id}/addresses/create', [CustomerControler::class, 'createAddressForm']);
Route::post('/customers/{id}/addresses/create', [CustomerControler::class, 'createAddress']);
