<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/product', [ProductController::class, 'get']);
Route::post('/checkout', [OrderController::class, 'checkout']);
Route::get('/order/{id}', [OrderController::class, 'getOrder']);
