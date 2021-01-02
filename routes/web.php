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

Route::get('/', [\App\Http\Controllers\HelloController::class, 'sayHello']);

Route::get('/categories', [\App\Http\Controllers\NewsController::class, 'showCategories'])
    ->name('categories');

Route::get('/categories/{id}', [\App\Http\Controllers\NewsController::class, 'showAllNewsOfCategory'])
    ->where('id', '\d+')
    ->name('categories.id');

Route::get('/categories/{categoryId}/news/{id}', [\App\Http\Controllers\NewsController::class, 'showOneNews'])
    ->where(['categoryId' => '\d+', 'id' => '\d+'])
    ->name('categories.categoryId.news.id');

Route::group(['prefix' => 'admin/news', 'name' => 'admin.'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\NewsController::class, 'index'])
        ->name('news');

    Route::get('/create', [\App\Http\Controllers\Admin\NewsController::class, 'create'])
        ->name('news.create');

    Route::get('/{slug}/{id}/edit', [\App\Http\Controllers\Admin\NewsController::class, 'edit'])
        ->where(['slug' => '\w+', 'id' => '\d+'])
        ->name('news.edit');
});

