<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\KaryaController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/profile/update', [UserController::class, 'userProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::post('/user/update-password', [UserController::class, 'userUpdatePasswordt'])->name('user.updatePassword');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update',[AdminController::class,'adminProfileUpdate'])->name('admin.profile.update');
    Route::post('/admin/profile/update-password',[AdminController::class,'adminProfileUpdatepassword'])->name('admin.profile.updatePassword');

    // Route::controller(BrandController::class)->group(function () {
    //     Route::get('/admin/brand', 'index')->name('brand.index');
    //     Route::get('/admin/brand/tambah', 'create')->name('brand.tambah');
    //     Route::post('/admin/brand/store', 'store')->name('brand.store');
    // });

    Route::resource('/admin/brand', BrandController::class);
    Route::get('/admin/brand/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

    Route::resource('/admin/category', CategoryController::class);
    Route::get('/admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::resource('/admin/subcategory', SubCategoryController::class);
    Route::get('/admin/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');

    Route::resource('/admin/karya', KaryaController::class);
});

// Sekolah Dashboard
Route::middleware(['auth', 'role:sekolah'])->group(function () {
    Route::get('/sekolah/dashboard',[SekolahController::class,'sekolahDashboard'])->name('sekolah.dashboard');
    Route::get('/sekolah/logout',[SekolahController::class,'sekolahLogout'])->name('sekolah.logout');
    Route::get('/sekolah/profile',[SekolahController::class,'sekolahProfile'])->name('sekolah.profile');
    Route::post('/sekolah/profile/update',[SekolahController::class,'sekolahProfileUpdate'])->name('sekolah.profile.update');
    Route::post('/sekolah/profile/update-password',[SekolahController::class,'sekolahProfileUpdatepassword'])->name('sekolah.profile.updatePassword');

});

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/sekolah/login', [SekolahController::class, 'sekolahLogin'])->name('sekolah.login');




