<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\GtkpaudtvController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MajalahbuletinController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PencegahanStuntingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Berita;
use App\Models\Gtkpaudtv;
use App\Models\MajalahBuletin;
use App\Models\PencegahanStunting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $berita = Berita::count();
        $gtkpaudtv = Gtkpaudtv::count();
        $majtin = MajalahBuletin::count();
        $stunting = PencegahanStunting::count();
        return view('dashboard', compact('berita', 'gtkpaudtv', 'majtin', 'stunting'));
    })->name('dashboard');

    Route::controller(BeritaController::class)->group(function () {
        Route::get('berita', 'index')->name('berita');
        Route::get('beritaGet', 'beritaGet');
        Route::post('beritaStore', 'store');
        Route::get('beritaEdit/{id}', 'edit');
        Route::post('beritaDestroy/{id}', 'destroy');
    });

    Route::controller(GtkpaudtvController::class)->group(function () {
        Route::get('gtkpaudtv', 'index')->name('gtkpaudtv');
        Route::get('gtkpaudtvGet', 'gtkpaudtvGet');
        Route::post('gtkpaudtvStore', 'store');
        Route::get('gtkpaudtvEdit/{id}', 'edit');
        Route::post('gtkpaudtvDestroy/{id}', 'destroy');
    });

    Route::controller(MajalahbuletinController::class)->group(function () {
        Route::get('majalahBuletin', 'index')->name('majalah-buletin');
        Route::get('majalahBuletinGet', 'majalahBuletinGet');
        Route::post('majalahBuletinStore', 'store');
        Route::get('majalahBuletinEdit/{id}', 'edit');
        Route::post('majalahBuletinDestroy/{id}', 'destroy');
    });

    Route::controller(PencegahanStuntingController::class)->group(function () {
        Route::get('pencegahanStunting', 'index')->name('pencegahan-stunting');
        Route::get('pencegahanStuntingGet', 'pencegahanStuntingGet');
        Route::post('pencegahanStuntingStore', 'store');
        Route::get('pencegahanStuntingEdit/{id}', 'edit');
        Route::post('pencegahanStuntingDestroy/{id}', 'destroy');
    });

    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::controller(KategoriController::class)->group(function () {
            Route::get('kategori', 'index')->name('kategori');
            Route::get('kategoriGet', 'kategoriGet');
            Route::post('kategoriStore', 'store');
            Route::get('kategoriEdit/{id}', 'edit');
            Route::post('kategoriDestroy/{id}', 'destroy');
        });
    });

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
