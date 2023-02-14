<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\SourcesController as AdminSourcesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\FeedbacksController as AdminFeedbacksController;
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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {

    Route::get(
        '/',
        AdminController::class
    )->name('index');

    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('feedbacks', AdminFeedbacksController::class);
    Route::resource('sources', AdminSourcesController::class);
});

// guest routes
Route::redirect('/news', '/guest/news');

Route::group(['prefix' => 'guest'], static function() {

    Route::get(
        '/welcome',
        [WelcomeController::class, 'index']
    );
    Route::get(
        '/news',
        [NewsController::class, 'index']
    )->name('news');

    Route::get(
        '/news/{id}/show',
        [NewsController::class, 'show']
    )->whereNumber('id')
        ->name('news.show');

    Route::get(
        '/categories',
        [CategoriesController::class, 'index']
    )->name('categories');

    Route::get(
        '/categories/{category}/show',
        [CategoriesController::class, 'show']
    )->whereAlpha('category')
        ->name('categories.show');

    Route::resource('feedbacks',FeedbacksController::class);
});


