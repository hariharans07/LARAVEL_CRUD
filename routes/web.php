<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\stdController;

Route::get('/', [stdController::class,"index"]);
Route::post('/add/user', [stdController::class,"adduser"]);
Route::delete("/delete/user/{id}", [stdController::class,"deleteuser"]);
Route::get("/editview/user/{id}", [stdController::class,"editviewuser"]);
Route::post("/edit/user/{id}", [stdController::class,"edituser"]);



