<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; //Sistema de Login/Cadastro

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware('auth');

Route::get('/', fn () => redirect('/login'));
?>