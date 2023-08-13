<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;

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

Route::get('/', [HomeController::class, 'homepage']);

Route::get('/post_page', [AdminController::class, 'post_page']);

Route::post('/add_post', [AdminController::class, 'add_post']);

Route::get('/show_post', [AdminController::class, 'show_post']);

Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);

Route::get('/edit_post/{id}', [AdminController::class, 'edit_post']);

Route::post('/update_page/{id}', [AdminController::class, 'update_page']);

Route::get('/post_detail/{id}', [HomeController::class, 'post_detail']);

Route::get('/user_post', [HomeController::class, 'user_post'])->middleware('auth');

Route::post('/add_user_post', [HomeController::class, 'add_user_post'])->middleware('auth');

Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');

Route::get('/delete_userpost/{id}', [HomeController::class, 'delete_userpost'])->middleware('auth');

Route::get('/edit_userpost/{id}', [HomeController::class, 'edit_userpost'])->middleware('auth');

Route::post('/update_userpost/{id}', [HomeController::class, 'update_userpost'])->middleware('auth');

Route::get('/accept_post/{id}', [AdminController::class, 'accept_post'])->middleware('auth');

Route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->middleware('auth');














Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/post', [HomeController::class, 'post'])->middleware(['auth','admin']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
