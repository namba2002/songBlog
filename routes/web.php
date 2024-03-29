<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('posts/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/users/mmypage','mmypage')->name('mmypage');
    Route::get('/users/{user}','mypage')->name('mypage');
    Route::post('/posts/serch', 'serch')->name('serch');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::delete('/posts/{post}', 'delete')->name('delete');
});

require __DIR__.'/auth.php';
