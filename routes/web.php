<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;

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


// Route::get('/welcome', [ArticleController::class, 'welcome'])->name('articles');

Route::prefix('articles')
->middleware(['auth'])
->controller(ArticleController::class)
->name('articles.')
->group(function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/edit', 'update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});


//home
Route::controller(ArticleController::class)
->group(function(){
    Route::get('/', 'index')->name('home.index');
    Route::post('/', 'index')->name('home.post');
    Route::get('/articles/{id}', 'show')->name('articles.show');
});

//コメント
Route::prefix('articles')
->middleware(['auth'])
->controller(CommentController::class)
->name('comment.')
->group(
    function (){
        Route::post('/(id}', 'store')->name('store');
        Route::post('/{id}', 'update')->name('update');

    });

//タグ
Route::prefix('articles')
    ->middleware(['auth'])
    ->controller(TagController::class)
    ->name('tag.')
    ->group(
        function () {
            Route::post('/create', 'store')->name('store');
            // Route::post('/{id}', 'update')->name('update');
            //Route::get('/create', 'create')->name('create');
        }
    );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');//ログインしていたらダッシュボードを表示？

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
