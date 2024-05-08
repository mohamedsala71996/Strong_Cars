<?php

use App\Http\Controllers\Api\dashboard\AboutUsController;
use App\Http\Controllers\Api\dashboard\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\dashboard\ServiceController;
use App\Http\Controllers\Api\dashboard\VisitorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register',[ AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('about-us', AboutUsController::class);
    Route::post('/updateAboutUs', [AboutUsController::class,'updateAboutUs']);
    Route::resource('service',ServiceController::class);
    Route::post('/add-visitor', [VisitorController::class,'addVisitor']);

});

