<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\JobController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// User Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Notes Routes
Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
Route::post('/notes/upload', [NotesController::class, 'upload'])->name('notes.upload');
Route::get('/notes/download/{id}', [NotesController::class, 'download'])->name('notes.download');

// Chat Routes
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

// Video Routes
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');

// Job Routes
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');