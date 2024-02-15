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
        $player1->nombre="David";
        $player1->password="12345678";
        $player1->save();

        // Ejemplo 2
        $player2 = new Player();
        $player2->nombre = "Juan";
        $player2->password = "password123";
        $player2->save();

        // Ejemplo 3
        $player3 = new Player();
        $player3->nombre = "Ana";
        $player3->password = "qwerty";
        $player3->save();

        // Ejemplo 4
        $player4 = new Player();
        $player4->nombre = "Luis";
        $player4->password = "abcdef";
        $player4->save();

        // Ejemplo 5
        $player5 = new Player();
        $player5->nombre = "Maria";
        $player5->password = "987654";
        $player5->save();

        // Ejemplo 6
        $player6 = new Player();
        $player6->nombre = "Carlos";
        $player6->password = "pass123";
        $player6->save();

        // Ejemplo 7
        $player7 = new Player();
        $player7->nombre = "Laura";
        $player7->password = "abcd1234";
        $player7->save();

        // Ejemplo 8
        $player8 = new Player();
        $player8->nombre = "Pedro";
        $player8->password = "p@ssword";
        $player8->save();

        // Ejemplo 9
        $player9 = new Player();
        $player9->nombre = "Sofia";
        $player9->password = "sofia123";
        $player9->save();

        // Ejemplo 10
        $player10 = new Player();
        $player10->nombre = "Pablo";
        $player10->password = "pablo456";
        $player10->save();

        // Ejemplo 11
        $player11 = new Player();
        $player11->nombre = "Elena";
        $player11->password = "elena789";
        $player11->save();

        // Ejemplo 12
        $player12 = new Player();
        $player12->nombre = "Hector";
        $player12->password = "hectorpwd";
        $player12->save();

        // Ejemplo 13
        $player13 = new Player();
        $player13->nombre = "Isabel";
        $player13->password = "isabelpass";
        $player13->save();

        // Ejemplo 14
        $player14 = new Player();
        $player14->nombre = "Francisco";
        $player14->password = "franpass";
        $player14->save();

    }
}
