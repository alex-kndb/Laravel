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
    return view('welcome');
});

Route::get('/welcome/{name}', static function (string $name) : string {
    return "Hello, {$name}!";
});

Route::get('/about', static fn() : string => 'About_page');
Route::get('/contacts', static fn() : string => 'Contacts_page');
Route::get('/some', static fn() : string => 'Some_text');
