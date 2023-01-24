<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Comments\CommentsController as CommentsController;
use App\Http\Controllers\News\NewsDataController;





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
Route::group(['prefix' => 'admin', 'as' => 'admin.' ], static function () {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);

});

Route::group(['prefix' => ''], static function() {
    
    Route::get('/news/{id}/category', [NewsController::class, 'getNewsByCategories'])
        ->name('news.category');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});

Route::group(['prefix' => 'comment', 'as' => 'comment.'], static function() {
    Route::resource('create', CommentsController::class);
});

Route::group(['prefix' => 'data', 'as' => 'data.'], static function() {
    Route::resource('get', NewsDataController::class);
});


