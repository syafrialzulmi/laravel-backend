<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeCbtController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

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
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');

    Route::resource('homecbt', HomeCbtController::class);
    Route::resource('user', UserController::class);
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('userdelete');
    Route::resource('question', QuestionController::class);
    Route::get('question/delete/{id}', [QuestionController::class, 'delete'])->name('questiondelete');
});

// Route::get('/login', function () {
//     return view('pages.auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('pages.auth.register');
// })->name('register');

// Route::get('/users', function () {
//     return view('pages.users.index');
// });
