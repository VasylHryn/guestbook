<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\AdminMiddleware;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/guestbook', [MessageController::class, 'index'])->name('guestbook');
Route::post('/guestbook', [MessageController::class, 'store'])->name('message.store');




Route::get('/admin/messages', [MessageController::class, 'adminIndex'])->name('admin.messages')->middleware(AdminMiddleware::class);
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy')->middleware(AdminMiddleware::class);

require __DIR__.'/auth.php';
