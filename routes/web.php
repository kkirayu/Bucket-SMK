<?php

use App\Http\Controllers\ListDinas;
use App\Http\Controllers\ListSekolah;
use App\Http\Controllers\ListUser;
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
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdukController;

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

// Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/', [AdminController::class, 'adminLogin'])->name('home.index');
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
require __DIR__.'/auth.php';


// Role untuk user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/profile/update', [UserController::class, 'userProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::post('/user/update-password', [UserController::class, 'userUpdatePasswordt'])->name('user.updatePassword');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Role untuk semua admin
Route::group(['middleware' => ['auth', 'role:admin,kurator,sekolah']], function () {
    Route::get('/admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update',[AdminController::class,'adminProfileUpdate'])->name('admin.profile.update');
    Route::post('/admin/profile/update-password',[AdminController::class,'adminProfileUpdatepassword'])->name('admin.profile.updatePassword');
});

// Role untuk admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    // Route::resource('/admin/brand', BrandController::class);
    // Route::get('/admin/brand/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

    Route::resource('/admin/category', CategoryController::class);
    Route::get('/admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Route::resource('/admin/subcategory', SubCategoryController::class);
    // Route::get('/admin/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');

    Route::resource('/admin/jurusan', JurusanController::class);
    Route::get('/admin/jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

    Route::resource('/admin/list', ListSekolah::class);
    Route::resource('/admin/dinas', ListDinas::class);
    Route::resource('/admin/user', ListUser::class);
    Route::get('/admin/user/destroy/{id}', [ListSekolah::class, 'destroy'])->name('list.destroy');
});

// Role untuk admin dan sekolah
Route::group(['middleware' => ['auth', 'role:admin,sekolah']], function () {
    Route::resource('/admin/karya', KaryaController::class);
    
    Route::resource('/admin/produk', ProdukController::class);
    Route::get('/admin/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
