<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiseController;
use App\Http\Controllers\SliderController;
use App\Models\Servise;
use App\Http\Controllers\SubCategoryController;
use App\Models\SubCategory;
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

// Backend  pages  start
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return  view('admin.index');
    })->name('index');

    Route::resources([
        'slider' => SliderController::class,
        'category' => CategoryController::class,
        'subcategory' => SubCategoryController::class,
        'news' => NewsController::class,
        'servise' => ServiseController::class,
        'media' => MediaController::class,
        'about' =>AboutController::class,
        'connection' => ConnectionController::class,
        'footer' => FooterController::class,
        'product' => ProductController::class,
    ]);

    Route::post('/status', [AdminController::class, 'status'])->name('status');
});

// Backend  pages  end 
