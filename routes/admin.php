<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FinancialTrackingController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UnitController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest'], 'as' => 'admin.'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::group(['middleware' => ['is_admin_authenticated'], 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/units', [UnitController::class, 'index'])->name('units.index');

    Route::get('/financial-tracking', [FinancialTrackingController::class, 'index'])->name('financial-tracking.index');

    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');

    Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
});
