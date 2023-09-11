<?php
use Filament\Http\Controllers\FilamentAssetController;
use Filament\Http\Controllers\FilamentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DatabaseCheckController;
use App\Http\Controllers\Auth\LoginController;

// Маршруты для авторизации
Auth::routes();

// Включить маршруты для регистрации
Auth::routes(['register' => true]);

// Включить маршруты для сброса пароля
Auth::routes(['reset' => true]);

Route::get('/check-database', [DatabaseCheckController::class, 'checkDatabaseConnection']);

Route::middleware(['auth'])->group(function () {
    Route::get('/filament/{view?}', [FilamentController::class, 'index'])->where('view', '(.*)')->name('filament');
});

Route::get('/filament-assets/{asset}', [FilamentAssetController::class, 'show'])->where('asset', '(.*)');
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('genres', GenreController::class);
Route::get('/', [HomeController::class, 'index']);

Route::get('/genres/create', [GenreController::class, 'create']);
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genre.show');
Route::post('/genres', [GenreController::class, 'store']);

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    // Логика обработки запроса
});





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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
