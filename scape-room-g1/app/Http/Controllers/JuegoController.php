<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game1_puzzle;
use App\Models\Game3_hangman;

class JuegoController extends Controller
{
    public function getInfoJuego1(){
        $molecula=Game1_puzzle::all();
        return $molecula;
    }

    public function getInfoJuego3(){
        $palabra=Game3_hangman::all();
        return $palabra;
    }
}
