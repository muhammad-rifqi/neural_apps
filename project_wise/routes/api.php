<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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
Route::post('/project_new', [App\Http\Controllers\ProjectController::class, 'new'])->name('project_new');
Route::get('/selectedproject/{id}', [App\Http\Controllers\ProjectController::class, 'selectedproject']);
Route::get('/bacateam/{id}', [App\Http\Controllers\ProjectController::class, 'bacateam']);
Route::get('/bacarisk/{id}', [App\Http\Controllers\ProjectController::class, 'bacaresiko']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });

//     Route::post('/project_information', [ProjectController::class, 'store'])->name('projects_information');
//     Route::post('/team', [ProjectController::class, 'team'])->name('team');
//     Route::post('/risk', [ProjectController::class, 'risk'])->name('risk');
// });