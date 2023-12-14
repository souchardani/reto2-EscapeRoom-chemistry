<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game3_hangman;

class Game3_hangmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ['word']

        $hangman1 = new Game3_hangman();
        $hangman1->word = 'Bacillus cereus';
        $hangman1->save();

        $hangman2 = new Game3_hangman();
        $hangman2->word = 'Shigella sonnei';
        $hangman2->save();

        $hangman3 = new Game3_hangman();
        $hangman3->word = 'Penicillium spp';
        $hangman3->save();

        $hangman4 = new Game3_hangman();
        $hangman4->word = 'Staphilococcus aureus';
        $hangman4->save();

        $hangman5 = new Game3_hangman();
        $hangman5->word = 'Candida albicans';
        $hangman5->save();

        $hangman6 = new Game3_hangman();
        $hangman6->word = 'Brucella abortus';
        $hangman6->save();

        $hangman7 = new Game3_hangman();
        $hangman7->word = 'Escherichia coli';
        $hangman7->save();

        $hangman8 = new Game3_hangman();
        $hangman8->word = 'Aspergillus niger';
        $hangman8->save();

        $hangman9 = new Game3_hangman();
        $hangman9->word = 'Lactobacillus casei';
        $hangman9->save();

        $hangman10 = new Game3_hangman();
        $hangman10->word = 'Streptococcus thermophilus';
        $hangman10->save();

        $hangman11 = new Game3_hangman();
        $hangman11->word = 'Mycobacterium tuberculosis';
        $hangman11->save();

        $hangman12 = new Game3_hangman();
        $hangman12->word = 'Mycobacterium leprae';
        $hangman12->save();

        $hangman13 = new Game3_hangman();
        $hangman13->word = 'Shigella dysenteriae';
        $hangman13->save();

        $hangman14 = new Game3_hangman();
        $hangman14->word = 'Proteus vulgaris';
        $hangman14->save();

        $hangman15 = new Game3_hangman();
        $hangman15->word = 'Klebsiella pneumoniae';
        $hangman15->save();
    }
}
