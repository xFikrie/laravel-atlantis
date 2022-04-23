<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'user-management', 'as' => 'user-management.'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('user', 'index')->name('user');
            Route::get('userGet', 'userGet');
            Route::post('userStore', 'store');
            Route::get('userEdit/{id}', 'edit');
            Route::post('userDestroy/{id}', 'destroy');
        });

        Route::controller(RoleController::class)->group(function () {
            Route::get('role', 'index')->name('role');
            Route::get('roleGet', 'roleGet');
            Route::post('roleStore', 'store');
            Route::get('roleEdit/{id}', 'edit');
            Route::get('roleManage/{id}', 'manage');
            Route::post('roleDestroy/{id}', 'destroy');
        });

        Route::controller(PermissionController::class)->group(function () {
            Route::get('permission', 'index')->name('permission');
            Route::get('permissionGet', 'permissionGet');
            Route::post('permissionStore', 'store');
            Route::get('permissionEdit/{id}', 'edit');
            Route::post('permissionDestroy/{id}', 'destroy');
        });
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::controller(ModuleController::class)->group(function () {
            Route::get('module', 'index')->name('module');
            Route::get('moduleGet', 'moduleGet');
            Route::post('moduleStore', 'store');
            Route::get('moduleEdit/{id}', 'edit');
            Route::post('moduleDestroy/{id}', 'destroy');
        });
    });
});

require __DIR__ . '/auth.php';
