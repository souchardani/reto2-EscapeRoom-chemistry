<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/inicio', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});


// Admin CRUD routes
Route::get('/admin/game1', [AdminController::class, 'game1'])->name('admin.game1');
Route::get('/admin/game2', [AdminController::class, 'game2'])->name('admin.game2');
Route::get('/admin/game3', [AdminController::class, 'game3'])->name('admin.game3');
Route::get('/admin/game4', [AdminController::class, 'game4'])->name('admin.game4');
