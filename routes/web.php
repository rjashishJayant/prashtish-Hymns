<?php

use App\Http\Controllers\FrontHomepageController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SongBookController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontHomepageController::class, 'frontHomepage'])->name('homepage.guest');

Route::get('/login', function () {
    return view('Pages.credentials.login');
})->name('login');

Route::get('prasthish/register', function () {
    return view('Pages.credentials.register');
})->name('register');


Route::middleware([Authenticate::class])->group(function () {
    Route::get('/homepage', [UsersController::class, 'Homepage'])->name('homepage')->middleware('age_check');
    Route::get('/categories', [CategoryController::class, 'categoriesList'])->name('categories.list');

    Route::prefix('category')->group(function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/add', function () {
                return view('Pages.category.add_category');
            })->name('category.add');

            Route::get('/view/{id}', [CategoryController::class, 'categoryView'])->name('category.view');
            Route::post('/save', [CategoryController::class, 'saveCategory'])->name('category.save');
            Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
            Route::put('/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
            Route::get('/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
        });
    });
    /*  Routes for lyrics */
    Route::prefix('lyrics')->group(function () {
        Route::get('/add', [SongBookController::class, 'addLyrics'])->name('lyrics.add');
        Route::post('/save', [SongBookController::class, 'saveLyrics'])->name('lyrics.save');
        Route::get('/view/{id}', [SongBookController::class, 'viewLyrics'])->name('lyrics.view');
        Route::get('/edit/{id}', [SongBookController::class, 'editLyrics'])->name('lyrics.edit');
        Route::put('/update/{id}', [SongBookController::class, 'updateLyrics'])->name('lyrics.update');
        Route::get('/delete/{id}', [SongBookController::class, 'deleteLyrics'])->name('lyrics.delete');
    });
    Route::get('lyrics', [SongBookController::class, 'allLyrics'])->name('lyrics.list');

    Route::get('search/song', [SongBookController::class, 'searchSong'])->name('search.song');


    Route::get('main-page/lyrics/{song_id}', [SongBookController::class, 'getLyrics'])->name('lyrics.get');
    Route::get('main-page/lyrics/download/{song_id}', [SongBookController::class, 'downloadLyricsAsPdf'])->name('lyrics.download');
    Route::get('parshtish/logout', [UsersController::class, 'logOut'])->name('prashtish.logout');
});

Route::post('parshtish', [UsersController::class, 'prashtishLogIn'])->name('prashtish.login');
Route::post('parshtish/register', [UsersController::class, 'register'])->name('prashtish.register');

