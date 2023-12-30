<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\AuthController;


Route::group(['middleware' => ['guest:tenant'], 'as' => 'tenant.'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::group(['middleware' => ['is_tenant_authenticated'], 'as' => 'tenant.'], function () {

    Route::post('/logout', [AuthController::class, "logout"])->name('logout');
    Route::get('/', function () {
        return view('tenant.dashboard.index');
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
