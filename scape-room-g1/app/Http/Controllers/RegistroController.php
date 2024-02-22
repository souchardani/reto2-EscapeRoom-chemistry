<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
class RegistroController extends Controller
{
    public function registro(Request $request){

        $registro=new Player();
        $registro->nick=$request->nick;
        $registro->password=$request->password;
        $registro->save();
    }

    public function revisar(){
        $revisar=Player::all();
        return $revisar;

    }
}
