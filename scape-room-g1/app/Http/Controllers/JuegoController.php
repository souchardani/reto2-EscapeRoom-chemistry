<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game1_puzzle;

class JuegoController extends Controller
{
    public function getInfoJuego1(){
        $molecula=Game1_puzzle::all();
        return $molecula;
    }
}
