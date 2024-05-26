<?php


use App\Http\Controllers\CauhinhController;
use App\Http\Controllers\congdoanController;
use App\Http\Controllers\DonhangController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\SanphamController;
use App\Models\Sanpham;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(KhachhangController::class)->prefix('khachhangs')->group(function () {
        Route::get('', 'index')->name('khachhangs');
        Route::get('view/{id}', 'view')->name('khachhangs.details');
        Route::get('add', 'add')->name('khachhangs.add');
        Route::post('add', 'save')->name('khachhangs.save');
        Route::get('edit/{id}', 'edit')->name('khachhangs.edit');
        Route::post('edit/{id}', 'update')->name('khachhangs.update');
        Route::get('delete/{id}', 'delete')->name('khachhangs.delete');

        Route::get('search/{search}', 'search')->name('khachhang.search');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('add', 'add')->name('products.add');
        Route::post('add', 'save')->name('products.save');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::post('edit/{id}', 'update')->name('products.update');
        Route::get('delete/{id}', 'delete')->name('products.delete');
    });

    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('', 'index')->name('category');
        Route::get('add', 'add')->name('category.add');
        Route::post('save', 'save')->name('category.save');
        Route::get('edit/{id}', 'edit')->name('category.edit');
        Route::post('edit/{id}', 'update')->name('category.update');
        Route::get('delete/{id}', 'delete')->name('category.delete');
    });

    Route::controller(congdoanController::class)->prefix('congdoan')->group(function () {
        Route::get('', 'index')->name('congdoan');
        Route::get('add', 'add')->name('congdoan.add');
        Route::post('save', 'save')->name('congdoan.save');
        Route::get('edit/{id}', 'edit')->name('congdoan.edit');
        Route::post('edit/{id}', 'update')->name('congdoan.update');
        Route::get('delete/{id}', 'delete')->name('congdoan.delete');
    });

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('users');
        Route::get('add', 'add')->name('users.add');
        Route::post('save', 'save')->name('users.save');
        Route::get('edit/{id}', 'edit')->name('users.edit');
        Route::post('edit/{id}', 'update')->name('users.update');
        Route::get('delete/{id}', 'delete')->name('users.delete');
    });

    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('', 'index')->name('orders');
    });

    Route::controller(DonhangController::class)->prefix('donhangs')->group(function () {
        Route::get('', 'index')->name('donhangs');
        Route::get('add', 'add')->name('donhangs.add');
        Route::post('save', 'save')->name('donhangs.save');
        Route::get('show/{id}', 'show')->name('donhangs.show');
        Route::post('show/{id}/themsp', 'themsp')->name('donhangs.show.themsp');
        Route::get('edit/{id}', 'edit')->name('donhangs.edit');
        Route::post('edit/{id}', 'update')->name('donhangs.update');
        Route::get('delete/{id}', 'delete')->name('donhangs.delete');

        Route::post('themkhachhang', 'themkhachhang')->name('donhangs.themkhachhang.save');
    });

    Route::controller(SanphamController::class)->prefix('sanphams')->group(function () {
        Route::get('', 'index')->name('sanphams');
        Route::get('add', 'add')->name('sanphams.add');
        Route::post('save', 'save')->name('sanphams.save');
        Route::get('show/{id}', 'show')->name('sanphams.show');
        // Route::post('show/{id}/themsp', 'themsp')->name('sanphams.show.themsp');
        Route::get('edit/{id}', 'edit')->name('sanphams.edit');
        Route::post('edit/{id}', 'update')->name('sanphams.update');
        Route::get('delete/{id}', 'delete')->name('sanphams.delete');

        Route::get('{id}/congdoan', 'getCongdoan')->name('sanphams.congdoan');
    });

    Route::controller(CauhinhController::class)->prefix('cauhinhs')->group(function () {
        Route::get('cauhinhs/{key}', 'getValueByKey')->name('getcauhinh'); //cho ben ngoai su dung
        Route::get('bu', 'getBu')->name('cauhinhs.form');
        Route::post('bu', 'saveBu')->name('cauhinhs.save');
    });
});