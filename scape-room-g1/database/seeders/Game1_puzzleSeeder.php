<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game1_puzzle;

class Game1_puzzleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ['molecule', 'img_molecule']

        $puzzle1 = new Game1_puzzle();
        $puzzle1->molecule = 'Formaldehído';
        $puzzle1->img_molecule = 'Formaldehído.png';
        $puzzle1->save();

        $puzzle2 = new Game1_puzzle();
        $puzzle2->molecule = 'Galactosa';
        $puzzle2->img_molecule = 'Galactosa.png';
        $puzzle2->save();

        $puzzle3 = new Game1_puzzle();
        $puzzle3->molecule = 'Ribosa';
        $puzzle3->img_molecule = 'Ribosa.png';
        $puzzle3->save();

        $puzzle4 = new Game1_puzzle();
        $puzzle4->molecule = 'Fructosa';
        $puzzle4->img_molecule = 'Fructosa.png';
        $puzzle4->save();

        $puzzle5 = new Game1_puzzle();
        $puzzle5->molecule = 'Piruvato';
        $puzzle5->img_molecule = 'Piruvato.png';
        $puzzle5->save();

        $puzzle6 = new Game1_puzzle();
        $puzzle6->molecule = 'Glucosa';
        $puzzle6->img_molecule = 'Glucosa.png';
        $puzzle6->save();

        $puzzle7 = new Game1_puzzle();
        $puzzle7->molecule = 'Ácido láctico';
        $puzzle7->img_molecule = 'Ácido láctico.png';
        $puzzle7->save();

        $puzzle8 = new Game1_puzzle();
        $puzzle8->molecule = 'Cloruro de bencilo';
        $puzzle8->img_molecule = 'Cloruro de bencilo.png';
        $puzzle8->save();

        $puzzle9 = new Game1_puzzle();
        $puzzle9->molecule = '3-metilhexano';
        $puzzle9->img_molecule = '3-metilhexano.png';
        $puzzle9->save();

        $puzzle10 = new Game1_puzzle();
        $puzzle10->molecule = '2,3-dimetilbutano';
        $puzzle10->img_molecule = '2,3-dimetilbutano.png';
        $puzzle10->save();

        $puzzle11 = new Game1_puzzle();
        $puzzle11->molecule = '3,4,5-trimetilciclohexeno';
        $puzzle11->img_molecule = '3,4,5-trimetilciclohexeno.png';
        $puzzle11->save();

        $puzzle12 = new Game1_puzzle();
        $puzzle12->molecule = 'm-dibromobenceno';
        $puzzle12->img_molecule = 'm-dibromobenceno.png';
        $puzzle12->save();

        $puzzle13 = new Game1_puzzle();
        $puzzle13->molecule = '2,2,4-trimetilpentano';
        $puzzle13->img_molecule = '2,2,4-trimetilpentano.png';
        $puzzle13->save();

        $puzzle14 = new Game1_puzzle();
        $puzzle14->molecule = '4-etil-4,5-dimetilciclohexeno';
        $puzzle14->img_molecule = '4-etil-4,5-dimetilciclohexeno.png';
        $puzzle14->save();

        $puzzle15 = new Game1_puzzle();
        $puzzle15->molecule = '1-etil-2,5-dimetil-4-propilbenceno';
        $puzzle15->img_molecule = '1-etil-2,5-dimetil-4-propilbenceno.png';
        $puzzle15->save();

        /*
        $puzzle1 = new Game1_puzzle();
        $puzzle1->molecule = '';
        $puzzle1->img_molecule = '';
        $puzzle1->save();
        */
    }
}
