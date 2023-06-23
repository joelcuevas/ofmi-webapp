<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\CompleteProfile;

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

// Admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    CompleteProfile::class,
])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::get('/page/{page}', [PageController::class, 'show'])->name('pages.show');

    Route::resource('contests', ContestController::class);

    // complete profile
    Route::get('/register/profile', [UserController::class, 'completeProfile'])
        ->withoutMiddleware(CompleteProfile::class)
        ->name('auth.complete-profile');
});

// Website
Route::middleware([
    CompleteProfile::class,
])->group(function () {
    Route::get('/', [WebsiteController::class, 'home'])->name('home');
    Route::get('/rules', [WebsiteController::class, 'home'])->name('rules');
    Route::get('/contest', [WebsiteController::class, 'home'])->name('contest');

    // IMPORTANT: this should always be the last route
    Route::get('/{slug}', [PageController::class, 'view'])->name('pages.view');
});

