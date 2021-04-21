<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadVideoController;

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
    return view('welcome');
})->name('home');

Route::get('/upload', [UploadVideoController::class, 'create'])->name('create');
Route::post('/store', [UploadVideoController::class, 'store'])->name('store_video');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/upload', function () {
    return view('upload');
})->name('upload');
