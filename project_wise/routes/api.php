<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/project_information', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects_information');
Route::post('/team', [App\Http\Controllers\ProjectController::class, 'team'])->name('team');
Route::post('/risk', [App\Http\Controllers\ProjectController::class, 'risk'])->name('risk');