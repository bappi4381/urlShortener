<?php
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    //Route::get('/url', [HomeController::class, 'url'])->name('url');
    

    Route::get('/url', [ShortUrlController::class, 'index'])->name('url');
    Route::post('/shorten', [ShortUrlController::class, 'store'])->name('url.shorten');
    Route::get('/stats', [ShortUrlController::class, 'stats'])->name('url.stats');
    Route::get('/{code}', [ShortUrlController::class, 'show']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
