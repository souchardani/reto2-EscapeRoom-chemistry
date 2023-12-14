<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game2_kuku;

class Game2_kukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ['compound', 'category']

        $kuku1 = new Game2_kuku();
        $kuku1->compound = 'Rockwell';
        $kuku1->category = 'ANÁLISIS';
        $kuku1->save();

        $kuku2 = new Game2_kuku();
        $kuku2->compound = 'Erlenmeyer';
        $kuku2->category = 'ANÁLISIS';
        $kuku2->save();

        $kuku3 = new Game2_kuku();
        $kuku3->compound = 'Charpy';
        $kuku3->category = 'ANÁLISIS';
        $kuku3->save();

        $kuku4 = new Game2_kuku();
        $kuku4->compound = 'Vickers';
        $kuku4->category = 'ANÁLISIS';
        $kuku4->save();

        $kuku5 = new Game2_kuku();
        $kuku5->compound = 'EPI';
        $kuku5->category = 'ANÁLISIS';
        $kuku5->save();

        $kuku6 = new Game2_kuku();
        $kuku6->compound = 'Autoclave';
        $kuku6->category = 'MICROBIOLOGÍA';
        $kuku6->save();

        $kuku7 = new Game2_kuku();
        $kuku7->compound = 'McFarland';
        $kuku7->category = 'MICROBIOLOGÍA';
        $kuku7->save();

        $kuku8 = new Game2_kuku();
        $kuku8->compound = 'Ziehl-Neelsen';
        $kuku8->category = 'MICROBIOLOGÍA';
        $kuku8->save();

        $kuku9 = new Game2_kuku();
        $kuku9->compound = 'IMVIC';
        $kuku9->category = 'MICROBIOLOGÍA';
        $kuku9->save();

        $kuku10 = new Game2_kuku();
        $kuku10->compound = 'Oxidasa';
        $kuku10->category = 'MICROBIOLOGÍA';
        $kuku10->save();

        $kuku11 = new Game2_kuku();
        $kuku11->compound = 'Pascal';
        $kuku11->category = 'MEDIDA';
        $kuku11->save();

        $kuku12 = new Game2_kuku();
        $kuku12->compound = 'Segundo';
        $kuku12->category = 'MEDIDA';
        $kuku12->save();

        $kuku13 = new Game2_kuku();
        $kuku13->compound = 'HBW';
        $kuku13->category = 'MEDIDA';
        $kuku13->save();

        $kuku14 = new Game2_kuku();
        $kuku14->compound = 'UFC';
        $kuku14->category = 'MEDIDA';
        $kuku14->save();

        $kuku15 = new Game2_kuku();
        $kuku15->compound = 'Milivoltio';
        $kuku15->category = 'MEDIDA';
        $kuku15->save();

        $kuku16 = new Game2_kuku();
        $kuku16->compound = 'Alelo';
        $kuku16->category = 'BIOTECNOLOGÍA';
        $kuku16->save();

        $kuku17 = new Game2_kuku();
        $kuku17->compound = 'Buffer';
        $kuku17->category = 'BIOTECNOLOGÍA';
        $kuku17->save();

        $kuku18 = new Game2_kuku();
        $kuku18->compound = 'PCR';
        $kuku18->category = 'BIOTECNOLOGÍA';
        $kuku18->save();


        $kuku19 = new Game2_kuku();
        $kuku19->compound = 'French';
        $kuku19->category = 'BIOTECNOLOGÍA';
        $kuku19->save();

        $kuku20 = new Game2_kuku();
        $kuku20->compound = 'Fenotipo';
        $kuku20->category = 'BIOTECNOLOGÍA';
        $kuku20->save();

    }
}
