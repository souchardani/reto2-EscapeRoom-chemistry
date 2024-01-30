<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    //devuelve todos los registros del ranking
    public function getInfoRanking(){
        $jugadores = Ranking::orderBy('time', 'asc')->get();
        return $jugadores;
    }

    //creo un registro nuevo en el ranking
    public function addPlayerToRanking(Request $request){
        $ranking=new Ranking();

        $ranking->difficulty=$request->dificultad;
        $ranking->time=$request->tiempo;
        $ranking->player_nickname=$request->nick;
        $ranking->save();
    }
}
