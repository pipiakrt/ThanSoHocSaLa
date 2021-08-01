<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Admin\ThanSoController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\HomePageController;
use App\Http\Controllers\Api\SeoPageController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resources([
    'auth' => AuthController::class,
    'accounts' => AccountController::class,
    'images' => ImageController::class,
    'posts' => PostController::class,
    'banners' => BannerController::class,
    'products' => ProductController::class,
    'homepage' => HomePageController::class,
    'sliders' => SliderController::class,
    'seos' => SeoPageController::class,
    'members' => MemberController::class,
    'reports' => ReportController::class,
    'newsletters' => NewsletterController::class,
    'categories' => CategoryController::class,
]);
