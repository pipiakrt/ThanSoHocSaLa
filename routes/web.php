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
use App\Http\Controllers\CartController;
use App\Http\Controllers\TuVanController;
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


Route::get('/', [HomeController::class, 'index']);

Route::prefix('/gioi-thieu')->group(function () {
    Route::get('/', [HomeController::class, 'gioithieu']);
    Route::get('/than-so-hoc', [HomeController::class, 'thansohocsala']);
    Route::get('/chuyen-gia', [HomeController::class, 'chuyengia']);
    Route::get('/su-menh', [HomeController::class, 'sumenh']);
    Route::get('/duong-doi', [HomeController::class, 'duongdoi']);
    Route::get('/{slug}', [PostController::class, 'show']);
});

Route::prefix('/san-pham')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{slug}', [ProductController::class, 'show']);
});

Route::post('/tu-van', [TuVanController::class, 'store']);
Route::get('/hoi-dap', [PostController::class, 'hoidap']);
Route::get('/hoi-dap/{slug}', [PostController::class, 'show']);
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

Route::get('/gio-hang', [CartController::class, 'index']);
Route::get('/gio-hang/trang-thai/{slug}', [CartController::class, 'update']);
Route::get('/gio-hang/{slug}', [CartController::class, 'store']);
Route::get('/gio-hang/xoa/{slug}', [CartController::class, 'destroy']);
Route::get('/dat-hang', [OrderController::class, 'nhapdiachi']);
Route::post('/thanh-toan', [OrderController::class, 'thanhtoan']);

Route::group(['middleware' => 'login'], function(){
    Route::prefix('/tai-khoan')->group(function () {
        Route::get('/', [AccountController::class, 'index']);
        Route::post('/cap-nhap', [AccountController::class, 'update']);
        Route::get('/don-hang', [AccountController::class, 'donhang']);
        Route::get('/dat-hang', [CartController::class, 'dathang']);
        Route::post('/thanh-toan', [ProductController::class, 'thanhtoan']);
        Route::get('/thanh-toan', [AccountController::class, 'thanhtoan']);
        Route::get('/lich-su-tra-cuu', [AccountController::class, 'lichsutracuu']);
        Route::get('/export/{id}', [ExportController::class, 'export']);
        Route::get('/lich-su-tra-cuu/{id}', [ExportController::class, 'ketqualichsutracuu']);
        Route::get('/gia-han/{id}', [AccountController::class, 'giahan']);
        Route::get('/dich-vu', [AccountController::class, 'dichvu']);
        Route::get('/tra-cuu-nang-cao', [ThanSoController::class, 'formnangcao']);
        Route::post('/tra-cuu-nang-cao', [ExportController::class, 'index']);
    });
});

Route::get('/dich-vu', [HomeController::class, 'dichvu']);
Route::get('/lien-he', [ReportController::class, 'index']);
Route::post('/lien-he', [ReportController::class, 'create']);
Route::post('/dang-ky', [ReportController::class, 'newsletter']);

Route::get('/tra-cuu', [ThanSoController::class, 'index']);
Route::get('/tra-cuu/{code}', [ThanSoController::class, 'show']);
Route::post('/tra-cuu', [ThanSoController::class, 'ketqua']);
Route::post('/gui-mail-ket-qua', [ThanSoController::class, 'guimail']);

Auth::routes();

Route::view('/sala-backend', 'admin.index')->where('any', '.*');
Route::view('/sala-backend/{any}', 'admin.index')->where('any', '.*');

Route::prefix('socialite')->group(function () {
    Route::get('login/{social}', [SocialAuthController::class, 'redirectToProvider']);
    Route::get('/{social}/callback', [SocialAuthController::class, 'handleProviderCallback']);
});

Route::prefix('address')->group(function () {
    Route::get('/province', [AddressController::class, 'province']);
    Route::get('/district/{id}', [AddressController::class, 'district']);
    Route::get('/ward/{id}', [AddressController::class, 'ward']);
});
