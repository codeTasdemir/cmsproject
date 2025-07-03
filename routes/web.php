<?php

use App\Http\Controllers\Admin\UserController as UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// LaravelLocalization ile çoklu dil desteği için gerekli ayarlar
// Bu ayarlar, LaravelLocalizationServiceProvider tarafından sağlanır
// Bu, uygulamanızın çoklu dil desteği sunmasını sağlar
// LaravelLocalizationServiceProvider'ın config/app.php dosyasında tanımlandığından emin olun

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
    
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // resources/views/dashboard.blade.php
    })->middleware(['auth'])->name('dashboard');

    //User Managament
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

    //Role Managament
    Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
    
});
