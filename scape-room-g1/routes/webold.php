<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Spatie\LaravelIgnition\FlareMiddleware\AddJobs;

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

Route::get('/admin/home',[AdminController::class,'home'])->name('home');


// Admin CRUD routes
Route::get('/admin/game1', [AdminController::class, 'game1'])->name('admin.game1');
Route::get('/admin/game2', [AdminController::class, 'game2'])->name('admin.game2');
Route::get('/admin/game3', [AdminController::class, 'game3'])->name('admin.game3');
Route::get('/admin/game4', [AdminController::class, 'game4'])->name('admin.game4');
Route::get('/admin/game5', [AdminController::class, 'game5'])->name('admin.game5');

// Admin CRUD create
Route::get('/admin/game1create', [AdminController::class, 'game1create'])->name('admin.game1create');
Route::get('/admin/game2create', [AdminController::class, 'game2create'])->name('admin.game2create');
Route::get('/admin/game1create', [AdminController::class, 'game1create'])->name('admin.game1create');
Route::get('/admin/game1create', [AdminController::class, 'game1create'])->name('admin.game1create');
Route::get('/admin/game5create', [AdminController::class, 'game5create'])->name('admin.game5create');

// Admin CRUD edit
Route::get('/admin/game1edit{id}', [AdminController::class, 'game1edit'])->name('admin.game1edit');
Route::get('/admin/game2edit{id}', [AdminController::class, 'game2edit'])->name('admin.game2edit');
Route::get('/admin/game1edit{id}', [AdminController::class, 'game1edit'])->name('admin.game1edit');
Route::get('/admin/game1edit{id}', [AdminController::class, 'game1edit'])->name('admin.game1edit');
Route::get('/admin/game5edit{id}', [AdminController::class, 'game5edit'])->name('admin.game5edit');

// Admin CRUD store create
Route::post('/admin/game1storeNew', [AdminController::class, 'game1storeNew'])->name('admin.game1storeNew');
Route::post('/admin/game2storeNew', [AdminController::class, 'game2storeNew'])->name('admin.game2storeNew');
Route::post('/admin/game1storeNew', [AdminController::class, 'game1storeNew'])->name('admin.game1storeNew');
Route::post('/admin/game1storeNew', [AdminController::class, 'game1storeNew'])->name('admin.game1storeNew');
Route::post('/admin/game5storeNew', [AdminController::class, 'game5storeNew'])->name('admin.game5storeNew');

// Admin CRUD store edit
Route::put('/admin/game1storeEdit{id}', [AdminController::class, 'game1storeEdit'])->name('admin.game1storeEdit');
Route::put('/admin/game2storeEdit{id}', [AdminController::class, 'game2storeEdit'])->name('admin.game2storeEdit');
Route::put('/admin/game1storeEdit{id}', [AdminController::class, 'game1storeEdit'])->name('admin.game1storeEdit');
Route::put('/admin/game1storeEdit{id}', [AdminController::class, 'game1storeEdit'])->name('admin.game1storeEdit');
Route::put('/admin/game5storeEdit{id}', [AdminController::class, 'game5editStore'])->name('admin.game5editStore');

// Admin CRUD delete
Route::get('/admin/game1destroy{id}', [AdminController::class, 'game1destroy'])->name('admin.game1destroy');
Route::get('/admin/game2destroy{id}', [AdminController::class, 'game2destroy'])->name('admin.game2destroy');
Route::get('/admin/game1destroy{id}', [AdminController::class, 'game1destroy'])->name('admin.game1destroy');
Route::get('/admin/game1destroy{id}', [AdminController::class, 'game1destroy'])->name('admin.game1destroy');
Route::get('/admin/game5destroy{id}', [AdminController::class, 'game5destroy'])->name('admin.game5destroy');

// Admin CRUD confirm delete
Route::delete('/admin/game1destroyConfirm{id}', [AdminController::class, 'game1destroyConfirm'])->name('admin.game1destroyConfirm');
Route::delete('/admin/game2destroyConfirm{id}', [AdminController::class, 'game2destroyConfirm'])->name('admin.game2destroyConfirm');
Route::delete('/admin/game1destroyConfirm{id}', [AdminController::class, 'game1destroyConfirm'])->name('admin.game1destroyConfirm');
Route::delete('/admin/game1destroyConfirm{id}', [AdminController::class, 'game1destroyConfirm'])->name('admin.game1destroyConfirm');
Route::delete('/admin/game5destroyConfirm{id}', [AdminController::class, 'game5destroyConfirm'])->name('admin.game5destroyConfirm');

