<?php

use App\Http\Controllers\ListDinas;
use App\Http\Controllers\ListSekolah;
use App\Http\Controllers\ListUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsesmenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\KaryaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SkController;
use App\Models\Sk;

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
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');
Route::get('/home', [AdminController::class, 'adminLogin'])->name('home.index');
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
require __DIR__.'/auth.php';
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/carts', [CartController::class, 'index'])->name('cart.index');

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
    Route::get('/download/template', [ProdukController::class, 'downloadTemplatePlan'])->name('download.template');
    Route::get('/download/bmc/{id}', [ProdukController::class, 'downloadBmc'])->name('download.bmc');

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


    Route::resource('/admin/users-sekolah', ListSekolah::class);
    Route::resource('/admin/users-kurator', ListDinas::class);
    Route::resource('/admin/users-user', ListUser::class);
    Route::get('/admin/users/destroy/{id}', [ListSekolah::class, 'destroy'])->name('list.destroy');

    Route::post('/admin/import_excel', [ListSekolah::class, 'import_excel'])->name('import.excel');
    Route::get('/admin/kurator/create', [ListDinas::class, 'create'])->name('kurator.create');
    Route::post('/admin/kurator/create', [ListDinas::class, 'store'])->name('kura.store');
    Route::post('/admin/import_excel/jurusan', [JurusanController::class, 'import_excel'])->name('import.jurusan');
});

// Role untuk admin dan sekolah
Route::group(['middleware' => ['auth', 'role:admin,sekolah']], function () {
    Route::resource('/admin/karya', KaryaController::class);

    Route::resource('/admin/produk', ProdukController::class);
    Route::get('/admin/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

// Role untuk admin dan kurator
Route::group(['middleware' => ['auth', 'role:admin,kurator']], function () {
    Route::resource('/admin/asesmen', AsesmenController::class);
    Route::get('/admin/asesmen-{id}', [AsesmenController::class, 'indexAsesmen'])->name('index.asesmen');
    Route::get('/admin/asesmen-approve/{id}', [AsesmenController::class, 'approveAsesmen'])->name('approve.asesmen');
    Route::resource('/admin/komentar', KomentarController::class);
    Route::resource('/admin/sk', SkController::class);
    Route::get('/admin/sk/destroy/{id}', [SkController::class, 'destroy'])->name('sk.destroy');
});
