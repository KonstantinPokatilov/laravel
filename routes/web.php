<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;


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

Route::get('/', [NewsController::class, 'index'])
        ->name('news');

//admin routes
Route::group(['prefix' => ''], static function () {
    Route::get('/admin', AdminController::class)
        ->name('admin.index');
});

Route::group(['prefix' => ''], static function() {
    
    Route::get('/news/{id}/category', [NewsController::class, 'getNewsByCategories'])
        ->name('news.category');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});
