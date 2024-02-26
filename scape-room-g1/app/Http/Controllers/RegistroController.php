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

    public function editPlayer(Request $request){
        $editPlayer=Player::find($request->id);
        if($request->password==null){
            $editPlayer->nick=$request->nick;
        }else {
            $editPlayer->nick=$request->nick;
            $editPlayer->password=$request->password;
        }
        $editPlayer->save();
    }

    public function getCurrentUser(Request $request){
        $id = $request->query('id'); // Obtiene el parámetro 'id' de la URL
        $currentUser = Player::find($id);
        return $currentUser;
    }
}
