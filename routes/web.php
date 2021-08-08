<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThanSoController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Str;

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


Route::get('/', [HomeController::class, 'index']);

Route::prefix('/gioi-thieu')->group(function () {
    Route::get('/', [HomeController::class, 'gioithieu']);
    Route::get('/ve-sala', [HomeController::class, 'thansohocsala']);
    Route::get('/chuyen-gia', [HomeController::class, 'chuyengia']);
    Route::get('/su-menh', [HomeController::class, 'sumenh']);
    Route::get('/duong-doi', [HomeController::class, 'duongdoi']);
    Route::get('/{slug}', [PostController::class, 'show']);
});

Route::prefix('/san-pham')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{slug}', [ProductController::class, 'show']);
    Route::get('/gia-dinh', function () {
        return 'Gói sản phẩm gia đình';
    });
    Route::get('/doanh-nghiep/', function () {
        return 'Gói sản phẩm doanh nghiệp';
    });
});

Route::get('/cau-chuyen', [PostController::class, 'cauchuyen']);
Route::prefix('/tin-tuc')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{slug}', [PostController::class, 'show']);
});

Route::prefix('/tai-khoan')->group(function () {
    Route::post('/quyen-mat-khau', [AccountController::class, 'sendMail']);
    Route::get('/doi-mat-khau', [AccountController::class, 'formreset']);
    Route::post('/quyen-mat-khau/{token}', [AccountController::class, 'reset']);
});

Route::group(['middleware' => 'login'], function(){
    Route::prefix('/tai-khoan')->group(function () {
        Route::get('/', [AccountController::class, 'index']);
        Route::post('/cap-nhap', [AccountController::class, 'update']);
        Route::get('/gio-hang', [AccountController::class, 'giohang']);
        Route::get('/thanh-toan', [AccountController::class, 'thanhtoan']);
        Route::get('/lich-su-tra-cuu', [AccountController::class, 'lichsutracuu']);
        Route::get('/lich-su-tra-cuu/{id}', [ExportController::class, 'ketqualichsutracuu']);
        Route::get('/gia-han/{id}', [AccountController::class, 'giahan']);
        Route::get('/gio-hang/{slug}', [ProductController::class, 'dathang']);
        Route::post('/gio-hang/{slug}', [ProductController::class, 'thanhtoan']);
        Route::get('/dich-vu', [AccountController::class, 'donhang']);
        Route::get('/tra-cuu-nang-cao', [ThanSoController::class, 'formnangcao']);
        Route::post('/tra-cuu-nang-cao', [ExportController::class, 'index']);
    });
});

Route::get('/dich-vu', [HomeController::class, 'dichvu']);
Route::get('/hoi-dap', [HomeController::class, 'hoidap']);

Route::get('/lien-he', [ReportController::class, 'index']);
Route::post('/lien-he', [ReportController::class, 'create']);
Route::post('/dang-ky', [ReportController::class, 'newsletter']);

Route::get('/dieu-khoan', function () {
    return 'điều khoản';
});

Route::get('/chinh-sach', function () {
    return 'chính sách';
});

Route::get('/tra-cuu', [ThanSoController::class, 'index']);
Route::get('/tra-cuu/{code}', [ThanSoController::class, 'show']);
Route::post('/tra-cuu', [ThanSoController::class, 'ketqua']);

Auth::routes();

Route::view('/admin', 'admin.index')->where('any', '.*');
Route::view('/admin/{any}', 'admin.index')->where('any', '.*');

Route::prefix('socialite')->group(function () {
    Route::get('login/{social}', [SocialAuthController::class, 'redirectToProvider']);
    Route::get('/{social}/callback', [SocialAuthController::class, 'handleProviderCallback']);
});

Route::prefix('address')->group(function () {
    Route::get('/province', [AddressController::class, 'province']);
    Route::get('/district/{id}', [AddressController::class, 'district']);
    Route::get('/ward/{id}', [AddressController::class, 'ward']);
});
