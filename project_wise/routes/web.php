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
Route::get('/retraining', [App\Http\Controllers\RetrainingController::class, 'index'])->name('retraining');
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');
Route::get('/study', [App\Http\Controllers\StudyController::class, 'index'])->name('study');
Route::get('/result', [App\Http\Controllers\ResultController::class, 'index'])->name('result');