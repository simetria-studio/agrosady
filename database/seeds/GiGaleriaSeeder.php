<?php

use App\Prowork\GaleriaImagem\Models\GiGaleria;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GiGaleriaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('gi_imagems')->delete();
        DB::table('gi_galerias')->delete();
        $faker = Faker::create();

        foreach (range(1, 3) as $i) {
            GiGaleria::create(
                    [
                        'titulo' => $faker->name(),
                        'descricao' => $faker->paragraph($nbSentences = 20),
                        'img_capa' => 'galeria-imagem/imagens/' . rand(1, 30) . '.jpg',
                    ]
            );
        }
    }

}
