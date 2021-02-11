<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Account\IndexController;
use \Illuminate\Support\Facades\Auth;

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

Route::get('/session', function () {
    $user = ['name' => 'Example2'];
    session($user);
//    session('name', $user['name'])->put();
    return redirect('session_result');
});

Route::get('/session_result', function () {
    session()->remove('name');
    dd(session()->all());
});

Route::resources([
    '/categories' => \App\Http\Controllers\Guest\CategoryController::class,
    '/categories.news' => \App\Http\Controllers\Guest\NewsController::class,
    '/feedback' => \App\Http\Controllers\Guest\FeedbackController::class,
    '/order' => \App\Http\Controllers\Guest\OrderController::class,
    '/allFeedbacks' => \App\Http\Controllers\Guest\AllFeedbackController::class,
    '/allOrders' => \App\Http\Controllers\Guest\AllOrderController::class
]);


Route::group(['prefix' => 'admin'], function () {
    Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('/profile', \App\Http\Controllers\Admin\ProfileController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');
    Route::get('/account', [IndexController::class, 'index'])
        ->name('account');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resources([
        '/news' => \App\Http\Controllers\Admin\NewsController::class,
        '/profiles' => \App\Http\Controllers\Admin\ProfileController::class,
        '/sources' => \App\Http\Controllers\Admin\SourceController::class
    ]);
});

Route::resources([
    '/categories' => \App\Http\Controllers\Guest\CategoryController::class,
    '/categories.news' => \App\Http\Controllers\Guest\NewsController::class,
    '/feedback' => \App\Http\Controllers\Guest\FeedbackController::class,
    '/order' => \App\Http\Controllers\Guest\OrderController::class,
    '/allFeedbacks' => \App\Http\Controllers\Guest\AllFeedbackController::class,
    '/allOrders' => \App\Http\Controllers\Guest\AllOrderController::class
]);

Route::get('/parser', [\App\Http\Controllers\ParserController::class, 'index'])->name('parser');
Route::get('/parser/news', [\App\Http\Controllers\ParserController::class, 'addNews'])->name('parser.news');
Route::get('/auth/vk/redirect', [\App\Http\Controllers\SocialVKController::class, 'redirect'])
    ->name('vk.redirect');
Route::get('/auth/vk/callback', [\App\Http\Controllers\SocialVKController::class, 'callback'])
    ->name('vk.callback');
