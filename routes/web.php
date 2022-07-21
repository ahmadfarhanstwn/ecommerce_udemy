<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});
 
Route::get('admin/profile', [AdminProfileController::class, 'profilePage'])->name('admin.profile');
Route::get('admin/edit_profile', [AdminProfileController::class, 'editProfilePage'])->name('admin.edit_profile');
Route::post('admin/edit_profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.edit_profile.update');
Route::get('admin/change_password', [AdminProfileController::class, 'changePassword'])->name('admin.change_password');
Route::post('admin/change_password/update', [AdminProfileController::class, 'updateChangePassword'])->name('admin.change_password.update');
Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

////   FRONTEND/USER    ////
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/user/logout', [IndexController::class, 'logout'])->name('user.logout');
Route::get('user/edit_profile', [IndexController::class, 'editProfile'])->name('user.edit_profile');