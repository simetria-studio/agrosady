<?php

use App\Prowork\GaleriaImagem\Models\GiImagem;
use App\Prowork\GaleriaImagem\Models\GiGaleria;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GiImagemSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();


        $galeria = GiGaleria::All();

        foreach ($galeria as $val) {

            foreach (range(1, 10) as $i) {
                $imagem = new GiImagem();
                $imagem->caminho = 'galeria-imagem/imagens/' . rand(1, 30) . '.jpg';
                $val->imagens()->save($imagem);
            }
        }
    }

}
