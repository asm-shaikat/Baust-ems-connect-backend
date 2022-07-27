<?php

use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Register a new member
Route::post('/register',[MemberController::class,'register']);

//Login for member 
Route::post('/login',[MemberController::class,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
