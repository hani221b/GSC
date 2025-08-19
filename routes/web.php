<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("users.index");
});

Route::get("login", function () {
    return view("auth.login");
})->name("login-view");

Route::get("register", function () {
    return view("auth.register");
})->name("register-view");

Route::get("logout", [UserController::class, 'logout'])->name("logout");

Route::middleware(['auth'])->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
    });

    Route::prefix('attendance')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('attendances.index');
        Route::get('/checkin/{userid}', [AttendanceController::class, 'checkIn'])->name('attendances.checkIn');
        Route::get('/user/{userid}', [AttendanceController::class, 'getUserAttendance'])->name('attendances.getUserAttendance');
    });

});

Route::post("register", [UserController::class, 'register'])->name("register");
Route::post("login", [UserController::class, 'login'])->name("login");