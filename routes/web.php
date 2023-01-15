<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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
    return view('news.main');
});

Route::group(['prefix' => ''], static function() {
    
    Route::get('/cat', [NewsController::class, 'getCategories'])
        ->name('news.categories');
    
    Route::get('/news/{id}/category', [NewsController::class, 'getNewsByCategories'])
        ->name('news.category');

    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});
