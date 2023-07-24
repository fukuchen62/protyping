<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * TOP Page
 */
Route::get('/', [App\Http\Controllers\TopController::class, 'index'])->name('top');

/**
 * About Page
 */
Route::get('about', [App\Http\Controllers\TopController::class, 'about'])->name('about');


// 以下はAuth関連設定です。
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * 管理画面TOPへのルート情報
 */
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'adminTop'])->name('admintop');

/**
 * 管理画面ログアウト
 * 福島
 */
Route::get(
    'admin/logout',
    [App\Http\Controllers\AdminController::class, 'logout']
)->name('logout');
