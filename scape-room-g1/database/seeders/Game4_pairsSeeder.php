<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game4_pairs;

class Game4_pairsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ['growth', 'caracteristics']

        $pairs1 = new Game4_pairs();
        $pairs1->growth = 'PCA';
        $pairs1->caracteristics = 'Recuento de mesófilos, aerobios y heterótrofos.';
        $pairs1->save();

        $pairs2 = new Game4_pairs();
        $pairs2->growth = 'McConkey';
        $pairs2->caracteristics = 'Detección de Coliformes, los de fermentación lenta tardan en crecer.';
        $pairs2->save();

        $pairs3 = new Game4_pairs();
        $pairs3->growth = 'CCA';
        $pairs3->caracteristics = 'Detección y recuento de E. coli y coliformes.';
        $pairs3->save();

        $pairs4 = new Game4_pairs();
        $pairs4->growth = 'KAA';
        $pairs4->caracteristics = 'Para la confirmación de enterococos.';
        $pairs4->save();

        $pairs5 = new Game4_pairs();
        $pairs5->growth = 'VRBG';
        $pairs5->caracteristics = 'Detección y recuento de coliformes en agua, alimentos…';
        $pairs5->save();

        $pairs6 = new Game4_pairs();
        $pairs6->growth = 'Hektoen';
        $pairs6->caracteristics = 'Se usa para el aislamiento y el cultivo de microorganismos Gram - entéricos, y especialmente para el aislamiento de especies de Shigella y Salmonella.';
        $pairs6->save();

        $pairs7 = new Game4_pairs();
        $pairs7->growth = 'TSA';
        $pairs7->caracteristics = 'Crecimiento general. Recuento de totales.';
        $pairs7->save();

        $pairs8 = new Game4_pairs();
        $pairs8->growth = 'KIA';
        $pairs8->caracteristics = 'Diferenciación de enterobacterias en base a la fermentación de hidratos de carbono y a la producción de ácido sulfhídrico.';
        $pairs8->save();

        $pairs9 = new Game4_pairs();
        $pairs9->growth = 'Citrato Simmons';
        $pairs9->caracteristics = 'Diferenciación de enterobacterias en base a la capacidad de usar citrato como única fuente de carbono y energía.';
        $pairs9->save();

        $pairs10 = new Game4_pairs();
        $pairs10->growth = 'Lauril sulfato con MUG';
        $pairs10->caracteristics = 'Se utiliza para la detección de coliformes y la detección fluorogénica de Escherichia coli en un entorno de laboratorio.';
        $pairs10->save();

        $pairs11 = new Game4_pairs();
        $pairs11->growth = 'Caldo de glucosa azida (ROTHE)';
        $pairs11->caracteristics = 'Es ideal para la enumeración de enterococos mediante el método de dilución en serie (NMP).';
        $pairs11->save();

        $pairs12 = new Game4_pairs();
        $pairs12->growth = 'Agar SLANETZ y BARTLEY';
        $pairs12->caracteristics = 'Aislamiento y recuento de enterococos.';
        $pairs12->save();

        $pairs13 = new Game4_pairs();
        $pairs13->growth = 'Agar Sangre';
        $pairs13->caracteristics = 'Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes y la clara visualización de la hemólisis.';
        $pairs13->save();

        $pairs14 = new Game4_pairs();
        $pairs14->growth = 'MCP';
        $pairs14->caracteristics = 'Aislamiento y recuento selectivo de Clostridium perfringens y sus esporas. Colonias amarillo-verdosas.';
        $pairs14->save();

        $pairs15 = new Game4_pairs();
        $pairs15->growth = 'Agua de peptona';
        $pairs15->caracteristics = 'Diluyente y enriquecimiento bacteriano. Se usa en la prueba INDOL y ONPG.';
        $pairs15->save();

    }
}
