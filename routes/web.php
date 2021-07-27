<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::prefix('/gioi-thieu')->group(function () {
    Route::get('/', function () {
        return view('gioi-thieu');
    });
    Route::get('/chuyen-gia', function () {
        return 'Giới thiệu chuyên gia';
    });
    Route::get('/su-menh', function () {
        return 'Giới thiệu sứ mệnh';
    });
    Route::get('/co-hoc-sala', function () {
        return 'Giới thiệu về cổ học sala';
    });
    Route::get('/than-so-hoc-sala', function () {
        return 'Giới thiệu về cổ học sala';
    });
});

Route::prefix('/san-pham')->group(function () {
    Route::get('/', function () {
        return view('san-pham');
    });
    Route::get('/ca-nhan', function () {
        return 'Gói sản phẩm cá nhân';
    });
    Route::get('/gia-dinh', function () {
        return 'Gói sản phẩm gia đình';
    });
    Route::get('/doanh-nghiep', function () {
        return 'Gói sản phẩm doanh nghiệp';
    });
});

Route::prefix('/tin-tuc')->group(function () {
    Route::get('/', function () {
        return view('tin-tuc');
    });
    Route::get('/chi-tiet', function () {
        return 'chi tiết tin tức';
    });
});

Route::prefix('/cau-chuyen')->group(function () {
    Route::get('/', function () {
        return view('cau-chuyen');
    });
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

Route::get('/tra-cuu', function () {
    return 'Tra cứu';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
