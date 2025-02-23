<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/music', [HomeController::class, 'music'])->name('music');
Route::get('/perkenalan', [HomeController::class, 'perkenalan'])->name('perkenalan');
Route::get('/ucapan', [HomeController::class, 'ucapan'])->name('ucapan');
Route::get('/pesan', [HomeController::class, 'pesan'])->name('pesan');
Route::get('/confess', [HomeController::class, 'confess'])->name('confess');
Route::get('/end', [HomeController::class, 'end'])->name('end');

// web.php
Route::get('/selamat', [MessageController::class, 'index'])->name('selamat');
Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');
Route::post('/reply-message/{id}', [MessageController::class, 'replyMessage'])->name('reply.message');

Route::get('/birthday-gallery', [GalleryController::class, 'index'])->name('gallery');

// web.php
Route::post('/set-session', function (Request $request) {
    session(['is_birthday_user' => $request->is_birthday_user]);
    return response()->json(['status' => 'success']);
})->name('set.session');

Route::get('/next', function () {
    return view('next'); // Ganti dengan nama view yang sesuai
})->name('next');
Route::get('/music-player', function () {
    return view('music-player');
})->name('music.player');
