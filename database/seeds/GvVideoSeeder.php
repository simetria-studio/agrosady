<?php

use App\Prowork\GaleriaVideo\Models\GvVideo;
use App\Prowork\GaleriaVideo\Models\GvGaleria;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GvVideoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();


        $galeria = GvGaleria::All();

        $lvideo = array();
        $lvideo[0] = 'RX25wIfe1YI';
        $lvideo[1] = '6zenKIxwB3o';
        $lvideo[2] = 'ik87hT8vrWE';
        $lvideo[3] = 'LNBVvKGvDd0';
        $lvideo[4] = 'iJdAVj7T4dk';
        $lvideo[5] = '9JJUM3YMAis';
        $lvideo[6] = '2NsdBjPBcT0';
        $lvideo[7] = 'ewJ7-xX9RJ4';
        $lvideo[8] = 'YnHi3yMJx-E';
        $lvideo[9] = 'O2y-hXUk_RY';
        $lvideo[10] = 'dwnpDpnGVR0';
        $lvideo[11] = 'NXhmd-fNBXo';
        $lvideo[12] = 'tigjnO2KnKg';
        $lvideo[13] = 'QOCcxo2Dv0o';
        $lvideo[14] = 'HU4C6QD36ug';
        $lvideo[15] = 'BM4R_1XuQlM';
        $lvideo[16] = 'ZTkCUj6K3qk';
        $lvideo[17] = '2vPSMG6p0Zc';
        $lvideo[18] = '6hIQ_hfkIiI';
        $lvideo[19] = 'BJzEMSWT1XA';


        foreach ($galeria as $val) {

            foreach (range(1, 10) as $i) {

                $video = new GvVideo();
                $video->caminho = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $lvideo[rand(0, 19)] . '" frameborder="0" allowfullscreen></iframe>';
                $val->videos()->save($video);
            }
        }
    }

}
