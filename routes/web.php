<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThanSoController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

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

Route::get('/pdf', [pdfController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/gioi-thieu')->group(function () {
    Route::get('/', [HomeController::class, 'gioithieu']);
    Route::get('/chuyen-gia', [HomeController::class, 'chuyengia']);
    Route::get('/su-menh', [HomeController::class, 'sumenh']);
    Route::get('/duong-doi', [HomeController::class, 'duongdoi']);
    Route::get('/cau-chuyen-hoc-sala', [HomeController::class, 'cohocsala']);
    Route::get('/than-so-hoc-sala', [HomeController::class, 'thansohocsala']);
});

Route::prefix('/san-pham')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{slug}', [ProductController::class, 'show']);
    Route::get('/gia-dinh', function () {
        return 'Gói sản phẩm gia đình';
    });
    Route::get('/doanh-nghiep', function () {
        return 'Gói sản phẩm doanh nghiệp';
    });
});

Route::prefix('/tin-tuc')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{slug}', [PostController::class, 'show']);
});

Route::prefix('/cau-chuyen')->group(function () {
    Route::get('/', [PostController::class, 'cauchuyen']);

    Route::get('/chi-tiet', function () {
        return 'chi tiết cau-chuyen';
    });
});

Route::prefix('/tai-khoan')->group(function () {
    Route::get('/', function () {
        return 'tài khoản';
    });
    Route::get('/gio-hang', function () {
        return 'giỏ hàng';
    });
});

Route::get('/dich-vu', function () {
    return 'Dịch vụ';
});

Route::get('/lien-he', function () {
    return view('lien-he');
});

Route::get('/dieu-khoan', function () {
    return 'điều khoản';
});

Route::get('/chinh-sach', function () {
    return 'chính sách';
});

Route::get('/tra-cuu', [ThanSoController::class, 'index']);
Route::get('/ket-qua-tra-cuu', [ThanSoController::class, 'ketqua']);

Auth::routes();

Route::view('/admin', 'admin.index')->where('any', '.*');
Route::view('/admin/{any}', 'admin.index')->where('any', '.*');
