<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RegistroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get game data with Axios
Route::get('/getjuego1',[JuegoController::class,'getInfoJuego1'])->name('getJuego1');
Route::get('/getjuego2',[JuegoController::class,'getInfoJuego2'])->name('getJuego2');
Route::get('/getjuego3',[JuegoController::class,'getInfoJuego3'])->name('getJuego3');
Route::get('/getjuego4',[JuegoController::class,'getInfoJuego4'])->name('getJuego4');
Route::get('/getjuego5',[JuegoController::class,'getInfoJuego5'])->name('getJuego5');
Route::get('/getRanking',[RankingController::class,'getInfoRanking'])->name('getRanking');
Route::get('/userlogin',[PlayerController::class,'getplayers'])->name('getPlayers');
Route::post('/addToRanking',[RankingController::class,'addPlayerToRanking'])->name('addPlayer');
Route::post('/registro',[RegistroController::class,'registro'])->name('registro');
Route::get('/registro',[RegistroController::class,'revisar']);
Route::post('/editPlayer',[RegistroController::class,'editPlayer']);
Route::get('/currentUser',[RegistroController::class,'getCurrentUser']);
