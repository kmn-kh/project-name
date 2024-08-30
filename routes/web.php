<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\GuardMiddleware;
use App\Http\Middleware\Islogin;

Route::get('/login', [AuthController::class, "showlogin"])->name('login')->middleware(GuardMiddleware::class);
Route::post('/login',[AuthController::class, "userLogin"]);


Route::get('/register', [AuthController::class, "showRegister"]);
Route::post('/register', [AuthController::class, "registerNew"]);

Route::get('/dashboard', [AuthController::class, "showDashboard"])->name("dashboard")->middleware(Islogin::class);


Route::get("logout",[AuthController::class, "logout"]);