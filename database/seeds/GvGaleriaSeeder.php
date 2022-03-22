<?php

use App\Prowork\GaleriaVideo\Models\GvGaleria;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GvGaleriaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('gv_videos')->delete();
        DB::table('gv_galerias')->delete();
        $faker = Faker::create();

        foreach (range(1, 3) as $i) {
            GvGaleria::create(
                    [
                        'titulo' => $faker->name(),
                        'descricao' => $faker->paragraph($nbSentences = 20),
                        'img_capa' => 'galeria-video/imagens-capa/' . rand(1, 10) . '.jpg',
                    ]
            );
        }
    }

}
