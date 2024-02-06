<?php

use App\Http\Controllers\AddressBook\AuthController;
use App\Http\Controllers\User\KeyDateController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:address_book'], 'as' => 'address_book.'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::group(['middleware' => ['auth.address_book'], 'as' => 'address_book.'], function () {

    Route::post('/logout', [AuthController::class, "logout"])->name('logout');
    Route::get('/', function () {
        return view('address-book.dashboard.index');
    })->name('dashboard.index');

    Route::group(['prefix' => 'contracts'], function () {
        Route::get('/', function () {
        })->name('contracts.index');
    });

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', function () {
        })->name('tasks.index');
    });

    Route::group(['prefix' => 'key-dates'], function () {
        Route::get('/', [KeyDateController::class, 'index'])->name('key-dates.index');
        Route::get('/show/{id}', [KeyDateController::class, 'show'])->name('key-dates.show');
    });
});
