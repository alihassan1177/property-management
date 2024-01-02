<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AccountingController,
    AuthController,
    DashboardController,
    KeyDateController,
    UnitController,
    AddressBookController,
    FinancialTrackingController,
    VatController,
    InvoiceCategoryController,
    InvoiceController,
    TenantController,
    OwnerController,
    ContractController,
    TaskController,
    ManagerController
};

Route::group(['middleware' => ['guest:admin'], 'as' => 'admin.'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::group(['middleware' => ['is_admin_authenticated'], 'as' => 'admin.'], function () {

    Route::post('/logout', [AuthController::class, "logout"])->name('logout');

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

    Route::group(['prefix' => 'address-book'], function () {
        Route::get('/', [AddressBookController::class, 'index'])->name('address-book.index');
        Route::get('/create', [AddressBookController::class, 'create'])->name('address-book.create');
        Route::post('/store', [AddressBookController::class, 'store'])->name('address-book.store');
        Route::get('/show/{id}', [AddressBookController::class, 'show'])->name('address-book.show');
    });

    Route::get('/financial-tracking', [FinancialTrackingController::class, 'index'])->name('financial-tracking.index');

    Route::group(['prefix' => 'accounting', 'as' => 'accounting.'], function () {
        Route::get('/', [AccountingController::class, 'index'])->name('index');

        Route::group(['prefix' => 'vat-management', 'as' => 'vat-management.'], function () {
            Route::get('/create', [VatController::class, 'create'])->name('create');
            Route::post('/store', [VatController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [VatController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [VatController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [VatController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix' => 'invoice-categories', 'as' => 'invoice-categories.'], function () {
            Route::get('/create', [InvoiceCategoryController::class, 'create'])->name('create');
            Route::post('/store', [InvoiceCategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [InvoiceCategoryController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [InvoiceCategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [InvoiceCategoryController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [InvoiceCategoryController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix' => 'invoices', 'as' => 'invoices.'], function () {
            Route::get('/create', [InvoiceController::class, 'create'])->name('create');
            Route::post('/store', [InvoiceController::class, 'store'])->name('store');
            Route::get('/show/{id}', [InvoiceController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [InvoiceController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [InvoiceController::class, 'delete'])->name('delete');
            Route::post('/add-payment/{id}', [InvoiceController::class, 'add_payment'])->name('add-payment');
        });
    });

    Route::group(['prefix' => 'contracts'], function () {
        Route::get('/', [ContractController::class, 'index'])->name('contracts.index');
        Route::get('/show/{id}', [ContractController::class, 'show'])->name('contracts.show');
    });

    Route::group(['prefix' => 'tenants'], function () {
        Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
        Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
        Route::post('/store', [TenantController::class, 'store'])->name('tenants.store');
        Route::get('/show/{id}', [TenantController::class, 'show'])->name('tenants.show');
        Route::delete('/delete/{id}', [TenantController::class, 'delete'])->name('tenants.delete');
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

    Route::group(['prefix' => 'managers'], function () {
        Route::get('/', [ManagerController::class, 'index'])->name('managers.index');
        Route::get('/create', [ManagerController::class, 'create'])->name('managers.create');
        Route::post('/store', [ManagerController::class, 'store'])->name('managers.store');
        Route::get('/show/{id}', [ManagerController::class, 'show'])->name('managers.show');
        Route::get('/edit/{id}', [ManagerController::class, 'edit'])->name('managers.edit');
        Route::post('/update/{id}', [ManagerController::class, 'update'])->name('managers.update');
        Route::delete('/delete/{id}', [ManagerController::class, 'delete'])->name('managers.delete');
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

    Route::group(['prefix' => 'keydates'], function () {
        Route::get('/', [KeyDateController::class, 'index'])->name('keydates.index');
        Route::get('/create', [KeyDateController::class, 'create'])->name('keydates.create');
        Route::post('/store', [KeyDateController::class, 'store'])->name('keydates.store');
        Route::get('/show/{id}', [KeyDateController::class, 'show'])->name('keydates.show');
        Route::get('/edit/{id}', [KeyDateController::class, 'edit'])->name('keydates.edit');
        Route::post('/update/{id}', [KeyDateController::class, 'update'])->name('keydates.update');
        Route::delete('/delete/{id}', [KeyDateController::class, 'delete'])->name('keydates.delete');
    });
});
