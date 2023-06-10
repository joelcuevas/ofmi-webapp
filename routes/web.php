<?php

use App\Http\Controllers\ContestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // @todo: change to put methods
    Route::get('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
    Route::get('/users/{user}/make-contestant', [UserController::class, 'makeContestant'])->name('users.make-contestant');


    Route::resource('contests', ContestController::class);
});

