<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game1_puzzle;
use App\Models\Game2_kuku;
use App\Models\Game4_pairs;
use App\Models\Game3_hangman;

class JuegoController extends Controller
{
    public function getInfoJuego1(){
        $molecula=Game1_puzzle::all();
        return $molecula;
    }
    public function getInfoJuego2(){
        $tarjeta= Game2_kuku::all();
        return $tarjeta;
    }
    public function getInfoJuego3(){
        $palabra=Game3_hangman::all();
        return $palabra;
    }
    public function getInfoJuego4(){
        $game4=Game4_pairs::all();
        return $game4;
    }
}
