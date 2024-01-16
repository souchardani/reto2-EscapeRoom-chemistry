<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Game;
use App\Models\Game1_puzzle;
use App\Models\Game2_kuku;
use App\Models\Game3_hangman;
use App\Models\Game4_pairs;
use App\Models\Game5_needPassword;
use App\Models\Ranking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call(GameSeeder::class);
        $this->call(Game1_puzzleSeeder::class);
        $this->call(Game2_kukuSeeder::class);
        $this->call(Game3_hangmanSeeder::class);
        $this->call(Game4_pairsSeeder::class);
        $this->call(Game5_needPasswordSeeder::class);
        $this->call(RankingSeeder::class);
    }
}
