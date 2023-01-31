<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Comments\CommentsController as CommentsController;
use App\Http\Controllers\News\NewsDataController;


Route::get('/', [NewsController::class, 'index'])
        ->name('news');

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.' ], static function () {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    // Route::resource('categories/delete/{id}', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);

});

Route::group(['prefix' => ''], static function() {
    
    Route::get('/news/{id}/category', [NewsController::class, 'getNewsByCategories'])
        ->name('news.category');

    Route::get('/news/{news_id}/show', [NewsController::class, 'show'])
        ->where('news_id', '\d+')
        ->name('news.show');
    Route::get('/news/delete/{id}', [NewsController::class, 'newsDelete']);
});

Route::group(['prefix' => 'comment', 'as' => 'comment.'], static function() {
    Route::resource('news', CommentsController::class);
});

Route::group(['prefix' => 'data', 'as' => 'data.'], static function() {
    Route::resource('get', NewsDataController::class);
});

Route::get('/categories/delete/{id}', [NewsController::class, 'categoryDelete']);


