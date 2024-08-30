<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/product', [ProductController::class, "getProduct"]);
Route::delete('product/{id}', [ProductController::class, "deleteProduct"]);
Route::post('/product', [ProductController::class, "addProduct"]);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
