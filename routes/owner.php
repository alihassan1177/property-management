<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\AuthController;

Route::group(['middleware' => ['guest:owner'], 'as' => 'owner.'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::group(['middleware' => ['is_owner_authenticated'], 'as' => 'owner.'], function () {

    Route::post('/logout', [AuthController::class, "logout"])->name('logout');
    Route::get('/', function () {
        return view('owner.dashboard.index');
    })->name('dashboard.index');

    Route::group(['prefix' => 'contracts'], function () {
        Route::get('/', function () {
        })->name('contracts.index');
    });

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', function () {
        })->name('tasks.index');
    });

});
