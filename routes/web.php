<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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


Route::get('/', [UrlController::class, 'index']);
Route::get('/create', [UrlController::class, 'create'])->name('url.create');
Route::post('/shorten', [UrlController::class, 'store'])->name('url.store');
Route::delete('/urls/{id}', [UrlController::class, 'destroy'])->name('urls.destroy');
Route::middleware(['cache.response'])->group(function () {
    Route::get('/{shortened}', [UrlController::class, 'show']);
});

