<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game5_needPassword;


class Game5_needPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $needpass1 = new Game5_needPassword();
        $needpass1->nombreCientifico= 'Henri Moissan';
        $needpass1->clave='F1886';
        $needpass1->save();

        $needpass2 = new Game5_needPassword();
        $needpass2->nombreCientifico= 'Hennig Brand';
        $needpass2->clave='P1669';
        $needpass2->save();

        $needpass3 = new Game5_needPassword();
        $needpass3->nombreCientifico= 'Humphrey Davy';
        $needpass3->clave='B1808';
        $needpass3->save();

        $needpass4 = new Game5_needPassword();
        $needpass4->nombreCientifico= 'Johan Gadolin';
        $needpass4->clave='Y1794';
        $needpass4->save();

        $needpass5 = new Game5_needPassword();
        $needpass5->nombreCientifico= 'Andrés M. del Río';
        $needpass5->clave='V1801';
        $needpass5->save();

        $needpass6 = new Game5_needPassword();
        $needpass6->nombreCientifico= 'Fausto Elhuyar';
        $needpass6->clave='W1783';
        $needpass6->save();

        $needpass7 = new Game5_needPassword();
        $needpass7->nombreCientifico= 'Juan J. Elhuyar';
        $needpass7->clave='W1783';
        $needpass7->save();

        $needpass8 = new Game5_needPassword();
        $needpass8->nombreCientifico= 'Bernard Courtois';
        $needpass8->clave='I1811';
        $needpass8->save();

        $needpass9 = new Game5_needPassword();
        $needpass9->nombreCientifico= 'Martin H. Klaproth';
        $needpass9->clave='U1789';
        $needpass9->save();

        $needpass10 = new Game5_needPassword();
        $needpass10->nombreCientifico= 'Louis J. Gay-Lussac';
        $needpass10->clave='B1808';
        $needpass10->save();

        $needpass11 = new Game5_needPassword();
        $needpass11->nombreCientifico= 'Louis J. Thenard';
        $needpass11->clave='B1808';
        $needpass11->save();

        $needpass12 = new Game5_needPassword();
        $needpass12->nombreCientifico= 'Henry Cavendish';
        $needpass12->clave='H1766';
        $needpass12->save();

        $needpass13 = new Game5_needPassword();
        $needpass13->nombreCientifico= 'Daniel Rutherford';
        $needpass13->clave='N1772';
        $needpass13->save();

        $needpass14 = new Game5_needPassword();
        $needpass14->nombreCientifico= 'Carl W. Scheele';
        $needpass14->clave='O1772';
        $needpass14->save();

    }
}
