<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game1_puzzle;
use App\Models\Game4_pairs;

class JuegoController extends Controller
{
    public function getInfoJuego1(){
        $molecula=Game1_puzzle::all();
        return $molecula;
    }

    public function getInfoJuego4(){
        $game4=Game4_pairs::all();
        //['id', 'growth', 'caracteristics']
        return $game4;
    }
}
