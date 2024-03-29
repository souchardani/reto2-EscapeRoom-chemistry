<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ranking;
use App\Models\Player;

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        $rankings = [
            ['difficulty' => 'Facil', 'time' => '00:12:35', 'player_nickname' => 'David', 'id_player' => 1],
            ['difficulty' => 'Facil', 'time' => '00:14:22', 'player_nickname' => 'Juan', 'id_player' => 2],
            ['difficulty' => 'Facil', 'time' => '00:14:42', 'player_nickname' => 'Ana', 'id_player' => 3],
            ['difficulty' => 'Facil', 'time' => '00:15:05', 'player_nickname' => 'Luis', 'id_player' => 4],
            ['difficulty' => 'Facil', 'time' => '00:16:12', 'player_nickname' => 'Maria', 'id_player' => 5],
            ['difficulty' => 'Normal', 'time' => '00:09:22', 'player_nickname' => 'Carlos', 'id_player' => 6],
            ['difficulty' => 'Normal', 'time' => '00:09:29', 'player_nickname' => 'David', 'id_player' => 1],
            ['difficulty' => 'Normal', 'time' => '00:10:59', 'player_nickname' => 'Pedro', 'id_player' => 8],
            ['difficulty' => 'Normal', 'time' => '00:11:06', 'player_nickname' => 'Sofia', 'id_player' => 9],
            ['difficulty' => 'Normal', 'time' => '00:12:35', 'player_nickname' => 'Pablo', 'id_player' => 10],
            ['difficulty' => 'Dificil', 'time' => '00:09:03', 'player_nickname' => 'Hector', 'id_player' => 11],
            ['difficulty' => 'Dificil', 'time' => '00:07:38', 'player_nickname' => 'Isabel', 'id_player' => 12],
            ['difficulty' => 'Dificil', 'time' => '00:06:25', 'player_nickname' => 'Francisco', 'id_player' => 13],
            ['difficulty' => 'Dificil', 'time' => '00:04:57', 'player_nickname' => 'Elena', 'id_player' => 14],
            
        ];
        foreach ($rankings as $rankingData) {
            $ranking = new Ranking();
            $ranking->difficulty = $rankingData['difficulty'];
            $ranking->time = $rankingData['time'];
            $ranking->player_nickname = $rankingData['player_nickname'];
            $ranking->id_player = $rankingData['id_player'];
            $ranking->save();
        }

    //     // ['difficulty', 'time', 'player_nickname']

    //     $ranking1 = new Ranking();
    //     $ranking1->difficulty = 'Facil';
    //     $ranking1->time = '00:12:35';
    //     $ranking1->player_nickname = 'Easy Pete';
    //     $ranking1->id_player=1;
    //     $ranking1->save();

    //     $ranking2 = new Ranking();
    //     $ranking2->difficulty = 'Facil';
    //     $ranking2->time = '00:14:22';
    //     $ranking2->player_nickname = 'Mike';
    //     $ranking2->id_player=14;
    //     $ranking2->save();

    //     $ranking3 = new Ranking();
    //     $ranking3->difficulty = 'Facil';
    //     $ranking3->time = '00:14:42';
    //     $ranking3->player_nickname = 'J03';
    //     $ranking3->id_player=13;
    //     $ranking3->save();

    //     $ranking4 = new Ranking();
    //     $ranking4->difficulty = 'Facil';
    //     $ranking4->time = '00:15:05';
    //     $ranking4->player_nickname = 'Dr 8';
    //     $ranking4->id_player=12;
    //     $ranking4->save();

    //     $ranking5 = new Ranking();
    //     $ranking5->difficulty = 'Facil';
    //     $ranking5->time = '00:16:12';
    //     $ranking5->player_nickname = 'Melom Munsk';
    //     $ranking5->id_player=11;
    //     $ranking5->save();

    //     $ranking6 = new Ranking();
    //     $ranking6->difficulty = 'Normal';
    //     $ranking6->time = '00:09:22';
    //     $ranking6->player_nickname = 'Normal Pete';
    //     $ranking6->id_player=2;
    //     $ranking6->save();

    //     $ranking7 = new Ranking();
    //     $ranking7->difficulty = 'Normal';
    //     $ranking7->time = '00:09:29';
    //     $ranking7->player_nickname = 'Easy Pete';
    //     $ranking7->id_player=1;
    //     $ranking7->save();

    //     $ranking8 = new Ranking();
    //     $ranking8->difficulty = 'Normal';
    //     $ranking8->time = '00:10:59';
    //     $ranking8->player_nickname = 'Mr Clean';
    //     $ranking8->id_player=3;
    //     $ranking8->save();

    //     $ranking9 = new Ranking();
    //     $ranking9->difficulty = 'Normal';
    //     $ranking9->time = '00:11:06';
    //     $ranking9->player_nickname = 'L3M0N';
    //     $ranking9->id_player=4;
    //     $ranking9->save();

    //     $ranking10 = new Ranking();
    //     $ranking10->difficulty = 'Normal';
    //     $ranking10->time = '00:12:35';
    //     $ranking10->player_nickname = 'Peter Griffin';
    //     $ranking10->id_player=5;
    //     $ranking10->save();

    //     $ranking11 = new Ranking();
    //     $ranking11->difficulty = 'Dificil';
    //     $ranking11->time = '00:09:03';
    //     $ranking11->player_nickname = 'Hard Pete';
    //     $ranking11->id_player=6;
    //     $ranking11->save();

    //     $ranking12 = new Ranking();
    //     $ranking12->difficulty = 'Dificil';
    //     $ranking12->time = '00:07:38';
    //     $ranking12->player_nickname = 'Mr X';
    //     $ranking12->id_player=7;
    //     $ranking12->save();

    //     $ranking13 = new Ranking();
    //     $ranking13->difficulty = 'Dificil';
    //     $ranking13->time = '00:06:25';
    //     $ranking13->player_nickname = 'Dr Doc';
    //     $ranking13->id_player=8;
    //     $ranking13->save();

    //     $ranking14 = new Ranking();
    //     $ranking14->difficulty = 'Dificil';
    //     $ranking14->time = '00:04:57';
    //     $ranking14->player_nickname = '-_-';
    //     $ranking14->id_player=9;
    //     $ranking14->save();

    //     $ranking15 = new Ranking();
    //     $ranking15->difficulty = 'Dificil';
    //     $ranking15->time = '00:00:08';
    //     $ranking15->player_nickname = 'Hunk';
    //     $ranking15->id_player=10;
    //     $ranking15->save();


    }
}
