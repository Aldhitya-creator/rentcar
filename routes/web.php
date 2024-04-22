<?php
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/cars', [CarController::class,'index'])->name('admin.cars.index');
Route::get('admin/cars/create', [CarController::class,'create'])->name('admin.cars.create');
Route::post('admin/cars', [CarController::class,'store'])->name('admin.cars.store');
Route::get('admin/cars/{car}/edit/', [CarController::class,'edit'])->name('admin.cars.edit');
Route::put('admin/cars/{car}', [CarController::class,'update'])->name('admin.cars.update');
Route::delete('admin/cars/{car}', [CarController::class,'destroy'])->name('admin.cars.destroy');


Route::get('/admin/types', [TypeController::class,'index'])->name('admin.types.index');
Route::get('admin/types/create', [TypeController::class,'create'])->name('admin.types.create');
Route::post('admin/types', [TypeController::class,'store'])->name('admin.types.store');
Route::get('admin/types/{type}/edit/', [TypeController::class,'edit'])->name('admin.types.edit');
Route::put('admin/types/{type}', [TypeController::class,'update'])->name('admin.types.update');
Route::delete('admin/types/{type}', [TypeController::class,'destroy'])->name('admin.types.destroy');

Route::get('/admin/bookings', [BookingController::class,'index'])->name('admin.bookings.index');
Route::delete('admin/bookings/{booking}', [BookingController::class,'destroy'])->name('admin.bookings.destroy');

Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index','destroy']);
Route::get('/admin/contacts', [ContactController::class,'index'])->name('admin.contacts.index');
Route::delete('admin/contacts/{contact}', [ContactController::class,'destroy'])->name('admin.contacts.destroy');
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);


Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
Route::resource('types', \App\Http\Controllers\Admin\TypeController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\http\Controllers\Frontend\HomepageController::class,'index'])->name('homepage');
Route::get('daftar-mobil', [\App\http\Controllers\Frontend\CarController::class,'index'])->name('car.index');
Route::get('daftar-mobil/{car}', [\App\http\Controllers\Frontend\CarController::class,'show'])->name('car.show');
Route::post('daftar-mobil', [\App\http\Controllers\Frontend\CarController::class,'store'])->name('car.store');
Route::get('blog', [\App\http\Controllers\Frontend\BlogController::class,'index'])->name('blog.index');
Route::get('blog/{blog:slug}', [\App\http\Controllers\Frontend\BlogController::class,'show'])->name('blog.show');
Route::get('tentang-kami',[\App\http\Controllers\Frontend\AboutController::class,'index']);
Route::get('kontak', [\App\http\Controllers\Frontend\ContactController::class,'index']);
Route::post('kontak', [\App\http\Controllers\Frontend\ContactController::class,'store'])->name('contact.store');