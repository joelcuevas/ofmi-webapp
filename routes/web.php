<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\UserController;
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

// Website
Route::middleware([
    CompleteProfile::class,
])->group(function () {
    Route::get('/', [WebsiteController::class, 'home'])->name('home');
    Route::get('/rules', [WebsiteController::class, 'home'])->name('rules');
    Route::get('/contest', [WebsiteController::class, 'home'])->name('contest');
});


// Panel
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    CompleteProfile::class,
])->group(function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // complete profile
    Route::get('/register/profile', [UserController::class, 'completeProfile'])
        ->withoutMiddleware(CompleteProfile::class)
        ->name('auth.complete-profile');

    // users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // contests
    Route::resource('contests', ContestController::class);
});

