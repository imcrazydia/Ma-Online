<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadVideoController;
use App\Http\Controllers\VideoController;

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

Route::get('/', [UploadVideoController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/profiel/{user}', [ProfileController::class, 'index'])->name('profiel');

Route::middleware(['auth:sanctum', 'verified'])->get('/upload', function () {
    return view('upload');
})->name('upload');
Route::post('/upload/create', [UploadVideoController::class, 'youtubeCreate'])->name('create');
Route::post('/store', [UploadVideoController::class, 'store'])->name('store');

Route::middleware(['auth:sanctum', 'verified'])->get('/video/{id}', [VideoController::class, 'index'])->name('video');
Route::middleware(['auth:sanctum', 'verified'])->get('/video/{id}/edit/{user}', [VideoController::class, 'edit'])->name('edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/video/{id}/delete/{user}', [VideoController::class, 'delete'])->name('delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/video/{id}/destroy/{user}', [VideoController::class, 'destroy'])->name('destroy');
