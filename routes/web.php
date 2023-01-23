<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
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
    return view('welcome');
});

// admin routes
Route::group(['prefix' => 'admin'], static function() {
    Route::get('/', AdminController::class)
        ->name('admin.index');
});

// guest routes
Route::redirect('/news', '/guest/news');
Route::group(['prefix' => 'guest'], static function() {
    Route::get('/welcome', [WelcomeController::class, 'index']);
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories');
    Route::get('/categories/{category}/show', [CategoriesController::class, 'show'])
        ->name('categories.show');
});
