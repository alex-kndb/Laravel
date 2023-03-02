<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\SourcesController as AdminSourcesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\FeedbacksController as AdminFeedbacksController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], static function() {
    Route::get('/account', AccountController::class)->name('account');
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
});

// admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function() {
    Route::get('/', AdminController::class)->name('index');
    Route::get('/parser', ParserController::class)->name('parser');
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('feedbacks', AdminFeedbacksController::class);
    Route::resource('sources', AdminSourcesController::class);
    Route::resource('users', AdminUsersController::class);
});

// guest routes
Route::group(['prefix' => 'guest', 'middleware' => 'guest'], static function() {

    Route::get('/auth/redirect/{driver}', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
            ->name('social.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialController::class, 'callback'])
        ->where('driver', '\w+');

    Route::get('/welcome', [WelcomeController::class, 'index']);

    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->whereNumber('id')
            ->name('news.show');

    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories');

    Route::get('/categories/{category}/show', [CategoriesController::class, 'show'])
        ->whereAlpha('category')
            ->name('categories.show');

    Route::resource('feedbacks',FeedbacksController::class);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');
