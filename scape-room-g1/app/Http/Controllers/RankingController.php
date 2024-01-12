<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    public function getInfoRanking(){
        $jugadores=Ranking::all();
        return $jugadores;
    }
}
