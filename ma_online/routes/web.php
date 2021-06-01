<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadVideoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AdminController;

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

Route::get('/search/', [VideoController::class, 'search'])->name('search');
Route::get('/tagSearch/', [VideoController::class, 'tagSearch'])->name('tagSearch');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/profiel/{user}', [ProfileController::class, 'index'])->name('profiel');

    Route::get('/video/{id}', [VideoController::class, 'index'])->name('video');
});

Route::middleware(['auth:sanctum', 'verified', 'student'])->group(function () {
    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');
    Route::post('/upload/create', [UploadVideoController::class, 'youtubeCreate'])->name('create');
    Route::post('/store', [UploadVideoController::class, 'store'])->name('store');

    Route::get('/video/{id}/edit/{user}', [VideoController::class, 'edit'])->name('edit');
    Route::post('/update', [VideoController::class, 'update'])->name('update');

    Route::get('/video/{id}/delete/{user}', [VideoController::class, 'delete'])->name('delete');
    Route::get('/video/{id}/destroy/{user}', [VideoController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function() {
    Route::get('/admin/videos', [AdminController::class, 'showVideos'])->name('showVideos');
    Route::get('/admin/video/{id}/destroy', [AdminController::class, 'deleteVideo'])->name('deleteVideo');

    Route::get('/admin/gebruikers', [AdminController::class, 'showUsers'])->name('showUsers');
    Route::get('/admin/gebruiker/{id}/destroy', [AdminController::class, 'deleteUser'])->name('deleteUser');
    // Route::get('/admin/tags', [AdminController::class, 'showTags'])->name('showTags');
});
