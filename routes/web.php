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

Route::get('/', [\App\Http\Controllers\Guest\HelloController::class, 'sayHello'])
    ->name('main');

Route::get('/allNews', [\App\Http\Controllers\Guest\AllNewsController::class, 'index'])
    ->name('allNews');

Route::resources([
    '/categories' => \App\Http\Controllers\Guest\CategoryController::class,
    '/categories.news' => \App\Http\Controllers\Guest\NewsController::class,
    '/feedback' => \App\Http\Controllers\Guest\FeedbackController::class,
    '/order' => \App\Http\Controllers\Guest\OrderController::class
]);


Route::group(['prefix' => 'admin'], function () {
    Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
});

