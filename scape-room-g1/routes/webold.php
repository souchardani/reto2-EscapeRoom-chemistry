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

// Admin CRUD create
Route::get('/admin/game1create', [AdminController::class, 'game1create'])->name('admin.game1create');
Route::get('/admin/game2create', [AdminController::class, 'game2create'])->name('admin.game2create');
Route::get('/admin/game3create', [AdminController::class, 'game3create'])->name('admin.game3create');
Route::get('/admin/game4create', [AdminController::class, 'game4create'])->name('admin.game4create');

// Admin CRUD edit
Route::get('/admin/game1edit{id}', [AdminController::class, 'game1edit'])->name('admin.game1edit');
Route::get('/admin/game2edit{id}', [AdminController::class, 'game2edit'])->name('admin.game2edit');
Route::get('/admin/game3edit{id}', [AdminController::class, 'game3edit'])->name('admin.game3edit');
Route::get('/admin/game4edit{id}', [AdminController::class, 'game4edit'])->name('admin.game4edit');

// Admin CRUD store create
Route::post('/admin/game1storeNew', [AdminController::class, 'game1storeNew'])->name('admin.game1storeNew');
Route::post('/admin/game2storeNew', [AdminController::class, 'game2storeNew'])->name('admin.game2storeNew');
Route::post('/admin/game3storeNew', [AdminController::class, 'game3storeNew'])->name('admin.game3storeNew');
Route::post('/admin/game4storeNew', [AdminController::class, 'game4storeNew'])->name('admin.game4storeNew');

// Admin CRUD store edit
Route::put('/admin/game1storeEdit{id}', [AdminController::class, 'game1storeEdit'])->name('admin.game1storeEdit');
Route::put('/admin/game2storeEdit{id}', [AdminController::class, 'game2storeEdit'])->name('admin.game2storeEdit');
Route::put('/admin/game3storeEdit{id}', [AdminController::class, 'game3storeEdit'])->name('admin.game3storeEdit');
Route::put('/admin/game4storeEdit{id}', [AdminController::class, 'game4storeEdit'])->name('admin.game4storeEdit');

// Admin CRUD delete
Route::get('/admin/game1destroy{id}', [AdminController::class, 'game1destroy'])->name('admin.game1destroy');
Route::get('/admin/game2destroy{id}', [AdminController::class, 'game2destroy'])->name('admin.game2destroy');
Route::get('/admin/game3destroy{id}', [AdminController::class, 'game3destroy'])->name('admin.game3destroy');
Route::get('/admin/game4destroy{id}', [AdminController::class, 'game4destroy'])->name('admin.game4destroy');

// Admin CRUD confirm delete
Route::delete('/admin/game1destroyConfirm{id}', [AdminController::class, 'game1destroyConfirm'])->name('admin.game1destroyConfirm');
Route::delete('/admin/game2destroyConfirm{id}', [AdminController::class, 'game2destroyConfirm'])->name('admin.game2destroyConfirm');
Route::delete('/admin/game3destroyConfirm{id}', [AdminController::class, 'game3destroyConfirm'])->name('admin.game3destroyConfirm');
Route::delete('/admin/game4destroyConfirm{id}', [AdminController::class, 'game4destroyConfirm'])->name('admin.game4destroyConfirm');

