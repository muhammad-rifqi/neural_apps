<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects');
Route::get('/teamp', [App\Http\Controllers\ProjectController::class, 'teamp'])->name('teamp');
Route::get('/riskp', [App\Http\Controllers\ProjectController::class, 'riskp'])->name('riskp');
Route::get('/retraining', [App\Http\Controllers\RetrainingController::class, 'index'])->name('retraining');
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');
Route::get('/study/{id}', [App\Http\Controllers\StudyController::class, 'index']);
Route::get('/current/{id}', [App\Http\Controllers\StudyController::class, 'current']);
Route::get('/recomendate/{id}', [App\Http\Controllers\StudyController::class, 'recomendate']);
Route::get('/result', [App\Http\Controllers\ResultController::class, 'index'])->name('result');
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
Route::get('/history/view/{id}', [App\Http\Controllers\HistoryController::class, 'show']);
Route::get('/history/view/{id}', [App\Http\Controllers\HistoryController::class, 'edit']);