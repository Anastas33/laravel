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

Route::get('/hello/{name}', function (string $name) {
    echo "Приветствую, {$name}";
});

Route::get('/about', function () {
    echo "Here is some information about project";
});

Route::get('/news', function () {
    return <<<ddd
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
</head>
<body>
    <div>Some news</div>
    <div>Some news</div>
    <div>Some news</div>
</body>
</html>
ddd;
});
