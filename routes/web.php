<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Comments\CommentsController as CommentsController;
use App\Http\Controllers\News\NewsDataController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\User\UsersController;



Route::get('/', [NewsController::class, 'index'])->name('news');

Route::group(['middleware' => 'auth'], static function(){
    Route::get('/account', AccountController::class)->name('account');
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
    
    //admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin' ], static function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        // Route::resource('categories/delete/{id}', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', UsersController::class);
    });
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

// Route::get('session', function() {
//     $sessionName = 'test';
//     if (session()->has($sessionName)) {
//         dd(session()->get($sessionName), session()->all());
//         session()->forget($sessionName);
//     }
//     session()->put($sessionName, 'example');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
