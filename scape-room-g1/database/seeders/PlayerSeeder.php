<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejemplo 1
        $player1= new Player();
        $player1->nick="David";
        $player1->password="12345678";
        $player1->save();

        // Ejemplo 2
        $player2 = new Player();
        $player2->nick = "Juan";
        $player2->password = "password123";
        $player2->save();

        // Ejemplo 3
        $player3 = new Player();
        $player3->nick = "Ana";
        $player3->password = "qwerty";
        $player3->save();

        // Ejemplo 4
        $player4 = new Player();
        $player4->nick = "Luis";
        $player4->password = "abcdef";
        $player4->save();

        // Ejemplo 5
        $player5 = new Player();
        $player5->nick = "Maria";
        $player5->password = "987654";
        $player5->save();

        // Ejemplo 6
        $player6 = new Player();
        $player6->nick = "Carlos";
        $player6->password = "pass123";
        $player6->save();

        // Ejemplo 7
        $player7 = new Player();
        $player7->nick = "Laura";
        $player7->password = "abcd1234";
        $player7->save();

        // Ejemplo 8
        $player8 = new Player();
        $player8->nick = "Pedro";
        $player8->password = "p@ssword";
        $player8->save();

        // Ejemplo 9
        $player9 = new Player();
        $player9->nick = "Sofia";
        $player9->password = "sofia123";
        $player9->save();

        // Ejemplo 10
        $player10 = new Player();
        $player10->nick = "Pablo";
        $player10->password = "pablo456";
        $player10->save();

        // Ejemplo 11
        $player11 = new Player();
        $player11->nick = "Elena";
        $player11->password = "elena789";
        $player11->save();

        // Ejemplo 12
        $player12 = new Player();
        $player12->nick = "Hector";
        $player12->password = "hectorpwd";
        $player12->save();

        // Ejemplo 13
        $player13 = new Player();
        $player13->nick = "Isabel";
        $player13->password = "isabelpass";
        $player13->save();

        // Ejemplo 14
        $player14 = new Player();
        $player14->nick = "Francisco";
        $player14->password = "franpass";
        $player14->save();

    }
}
