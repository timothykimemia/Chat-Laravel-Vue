<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['middleware' => 'verified'], function () {
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
        Route::get('/chat', [ChatController::class, 'index'])->name('chat');
    });

    Route::get('/chat/rooms', [ChatController::class, 'rooms']);
    Route::get('/chat/room/{roomId}/messages', [ChatController::class, 'messages']);
    Route::post('/chat/room/{roomId}/message', [ChatController::class, 'newMessage']);

});
