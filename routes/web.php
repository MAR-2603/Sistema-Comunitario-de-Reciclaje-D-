<?php

use App\Http\Controllers\Auth\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::match(['get', 'post'], '/login', function () {
    if (request()->isMethod('post')) {
        return 'Datos de inicio de sesión recibidos (en desarrollo)';
    }
    return view('auth.login');
})->name('login');

// Registro de vecinos (T03). Solo para visitantes que no iniciaron sesión.
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegistroController::class, 'create'])->name('register');
    Route::post('/register', [RegistroController::class, 'store'])->name('register.store');
});
