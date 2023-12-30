<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\AuthController;


Route::group(['middleware' => ['guest'], 'as' => 'tenant.'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
});