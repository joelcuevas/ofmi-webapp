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

    Route::get('/register/profile', [UserController::class, 'completeProfile'])
        ->withoutMiddleware(CompleteProfile::class)
        ->name('auth.complete-profile');

    // users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // @todo: change to put methods
    Route::get('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
    Route::get('/users/{user}/make-contestant', [UserController::class, 'makeContestant'])->name('users.make-contestant');


    // contests
    Route::resource('contests', ContestController::class);
});

