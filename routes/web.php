<?php

use App\Http\Controllers\MiscController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('style-guide', [MiscController::class, 'styleGuide'])->name('styleGuide');

Route::get('locale/{locale}', [MiscController::class, 'changeLocale'])->name('locale');

Route::get('/auth/redirect/{social}', [SocialLoginController::class, 'redirect'])->name('social.login');
Route::get('/auth/callback/{social}', [SocialLoginController::class, 'callback'])->name('social.callback');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('template')->group(function () {
    Route::get('/home', function () {
        return view('template.home');
    });

    Route::get('/login', function () {
        return view('template.login');
    });

    Route::get('/content', function () {
        return view('template.content');
    });
});

require __DIR__.'/auth.php';
