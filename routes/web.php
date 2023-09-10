<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseCheckController;

Route::get('/check-database', [DatabaseCheckController::class, 'checkDatabaseConnection']);


use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;


Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('genres', GenreController::class);

Route::get('/genres/create', [GenreController::class, 'create']);
Route::post('/genres', [GenreController::class, 'store']);






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

Route::get('/', function () {
    return view('layouts\app');
});
