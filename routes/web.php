<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThanSoController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ReportController;
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

Route::get('/than-so', function () {
    $name = "Trần Văn Kiên";
    $birthdate = "03/09/2000";

    function dequy ($birthdate) {
        $items = Str::of($birthdate)->explode('/');

        foreach ($items as $value) {
            $value = (int) $value;

            $multiplied = $collection->map(function ($item, $key) {
                return $item * 2;
            });

            if ($value > 9) {
                dd(str_split($value));
                dequy($value);
            }
        }
    }
    return dequy ($birthdate);
});

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/gioi-thieu')->group(function () {
    Route::get('/', [HomeController::class, 'gioithieu']);
    Route::get('/chuyen-gia/', [HomeController::class, 'chuyengia']);
    Route::get('/su-menh/', [HomeController::class, 'sumenh']);
    Route::get('/duong-doi/', [HomeController::class, 'duongdoi']);
    Route::get('/{slug}/', [PostController::class, 'show']);
});

Route::prefix('/san-pham')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{slug}/', [ProductController::class, 'show']);
    Route::get('/gia-dinh/', function () {
        return 'Gói sản phẩm gia đình';
    });
    Route::get('/doanh-nghiep/', function () {
        return 'Gói sản phẩm doanh nghiệp';
    });
});

Route::get('/cau-chuyen/', [PostController::class, 'cauchuyen']);
Route::prefix('/tin-tuc')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{slug}/', [PostController::class, 'show']);
});

Route::group(['middleware' => 'login'], function(){
    Route::prefix('/tai-khoan')->group(function () {
        Route::get('/', [AccountController::class, 'index']);
        Route::post('/cap-nhap/', [AccountController::class, 'update']);
        Route::get('/gio-hang/', [AccountController::class, 'giohang']);
        Route::get('/gio-hang/{slug}/', [ProductController::class, 'themsanpham']);
        Route::get('/don-hang/', [AccountController::class, 'donhang']);

        Route::post('/quyen-mat-khau', [AccountController::class, 'sendMail']);
        Route::get('/doi-mat-khau', [AccountController::class, 'formreset']);
        Route::post('/quyen-mat-khau/{token}', [AccountController::class, 'reset']);
    });
});

Route::get('/dich-vu/', [HomeController::class, 'dichvu']);
Route::get('/hoi-dap/', [HomeController::class, 'hoidap']);

Route::get('/lien-he/', [ReportController::class, 'index']);
Route::post('/lien-he/', [ReportController::class, 'create']);
Route::post('/dang-ky/', [ReportController::class, 'newsletter']);

Route::get('/dieu-khoan/', function () {
    return 'điều khoản';
});

Route::get('/chinh-sach', function () {
    return 'chính sách';
});

Route::get('/tra-cuu/', [ThanSoController::class, 'index']);
Route::get('/ket-qua-tra-cuu/', [ThanSoController::class, 'ketqua']);

Auth::routes();

Route::view('/admin', 'admin.index')->where('any', '.*');
Route::view('/admin/{any}', 'admin.index')->where('any', '.*');

Route::prefix('socialite')->group(function () {
    Route::get('login/{social}', [SocialAuthController::class, 'redirectToProvider']);
    Route::get('/{social}/callback', [SocialAuthController::class, 'handleProviderCallback']);
});
