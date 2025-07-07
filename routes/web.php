<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UpdatePasswordController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

//login
Route::post('/login', [LoginController::class, 'login'])->name('login');

//sair
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//rotas crud de usuarios com middlewares de autenticacao e admin
Route::middleware('auth', 'check.is.admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    //rota para editar a senha
    Route::put('/admin/users/{user}/password', [UpdatePasswordController::class, 'update'])->name('admin.users.update.password');
});
