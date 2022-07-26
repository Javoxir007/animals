<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/blog/{id}', [PagesController::class, 'full_blog'])->name('full_blog');
Route::get('/news', [PagesController::class, 'news'])->name('news');
Route::get('/interesting', [PagesController::class, 'interesting'])->name('interesting');
Route::get('/animals/{id}', [PagesController::class, 'wild_animals'])->name('wild_animals');

/* Category */
Route::prefix('admin/news')->name('admin/news/')->group(function() {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/create', [NewsController::class, 'create'])->name('create');
    Route::post('/store', [NewsController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [NewsController::class, 'update'])->name('update');
    Route::delete('/{id}', [NewsController::class, 'destroy'])->name('destroy');
});
