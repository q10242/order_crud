<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('orders', OrderController::class);

Route::resource('orderItems', OrderItemController::class);