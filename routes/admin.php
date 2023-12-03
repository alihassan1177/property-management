<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FinancialTrackingController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\TaskController;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest'], 'as' => 'admin.'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::group(['middleware' => ['is_admin_authenticated'], 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'units'], function () {
        Route::get('/', [UnitController::class, 'index'])->name('units.index');
        Route::get('/create', [UnitController::class, 'create'])->name('units.create');
        Route::post('/store', [UnitController::class, 'store'])->name('units.store');
        Route::get('/show/{id}', [UnitController::class, 'show'])->name('units.show');
        Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('units.edit');
        Route::post('/update/{id}', [UnitController::class, 'update'])->name('units.update');
        Route::delete('/delete/{id}', [UnitController::class, 'delete'])->name('units.delete');
    });

    Route::get('/financial-tracking', [FinancialTrackingController::class, 'index'])->name('financial-tracking.index');

    Route::group(['prefix' => 'tenants'], function () {
        Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
        Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
        Route::post('/store', [TenantController::class, 'store'])->name('tenants.store');
    });

    Route::group(['prefix' => 'owners'], function () {
        Route::get('/', [OwnerController::class, 'index'])->name('owners.index');
        Route::get('/create', [OwnerController::class, 'create'])->name('owners.create');
        Route::post('/store', [OwnerController::class, 'store'])->name('owners.store');
        Route::get('/show/{id}', [OwnerController::class, 'show'])->name('owners.show');
        Route::get('/edit/{id}', [OwnerController::class, 'edit'])->name('owners.edit');
        Route::post('/update/{id}', [OwnerController::class, 'update'])->name('owners.update');
        Route::delete('/delete/{id}', [OwnerController::class, 'delete'])->name('owners.delete');
    });

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/show/{id}', [TaskController::class, 'show'])->name('tasks.show');
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::post('/update/{id}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
    });
});
