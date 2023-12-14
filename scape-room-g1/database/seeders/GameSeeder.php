<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ['difficulty', 'base_time']

        $game1 = new Game();
        $game1->difficulty = 'Fácil';
        $game1->base_time = '00:30:00';
        $game1->save();

        $game2 = new Game();
        $game2->difficulty = 'Normal';
        $game2->base_time = '00:20:00';
        $game2->save();

        $game3 = new Game();
        $game3->difficulty = 'Difícil';
        $game3->base_time = '00:10:00';
        $game3->save();
    }
}
