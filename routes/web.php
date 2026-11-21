<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Registro (T03) e inicio de sesión (T04): solo para visitantes que no
// iniciaron sesión. Quien ya entró y visita estas páginas va al inicio.
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegistroController::class, 'create'])->name('register');
    Route::post('/register', [RegistroController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Rutas privadas: solo para usuarios que iniciaron sesión. Un invitado que
// entre a una de estas páginas es enviado al login y, después de entrar,
// vuelve a la página que quería ver.
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
