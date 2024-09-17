<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\GuardMiddleware;
use App\Http\Middleware\adminlogin;
use App\Http\Middleware\userlogin;
use App\Http\Middleware\Islogin;

Route::get('/login', [AuthController::class, "showlogin"])->name('login')->middleware(GuardMiddleware::class);
Route::post('/login',[AuthController::class, "userLogin"])->middleware(GuardMiddleware::class);


Route::get('/register', [AuthController::class, "showRegister"])->middleware(GuardMiddleware::class);
Route::post('/register', [AuthController::class, "registerNew"])->middleware(GuardMiddleware::class);

Route::get('/dashboard', [AuthController::class, "showDashboard"])->name("dashboard")->middleware(middleware: userlogin::class);
Route::get('/show-profile', [AuthController::class, "showProfile"])->middleware(Islogin::class);
Route::put('update-profile/{id}',[AuthController::class, "updateProfile"])->middleware(Islogin::class);

Route::get('/admindashboard',[AuthController::class, "showAdboard"])->name("dashboardAdmin")->middleware(adminlogin::class);
Route::get("logout",[AuthController::class, "logout"]);