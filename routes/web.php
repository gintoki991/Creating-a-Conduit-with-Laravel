<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConduitController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WelcomeController;

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

//Route::get('conduits/conduit', [ConduitController::class, 'index']);

Route::get('/welcome', [ArticleController::class, 'welcome'])->name('articles');


//Route::resource('articles', ArticleController::class);

Route::prefix('articles')
->middleware(['auth'])
->controller(ArticleController::class)
->name('articles.')
->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    // Route::get('/{id}/', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(WelcomeController::class)
->name('welcome')
->group(function(){
    Route::get('/', 'index')->name('index');
    //Route::get('/{id}', 'show')->name('show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');//ログインしていたらダッシュボードを表示？

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
