<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
class PlayerController extends Controller
{
    public function getplayers(){
        $players=Player::all();
        return $players;
    }
}
