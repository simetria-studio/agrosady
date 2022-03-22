<?php

use App\Prowork\GaleriaEvento\Models\GaleriaEvento;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GaleriaEventoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('galeria_eventos')->delete();
        $faker = Faker::create();

        foreach (range(1, 5) as $i) {
            GaleriaEvento::create(
                    [
                        'titulo' => $faker->paragraph($nbSentences = 1),
                        'data' => $faker->date(),
                        'hora' => $faker->time(),
                        'local' => $faker->locale(),
                        'descricao' => $faker->paragraph($nbSentences = 3),
                    ]
            );
        }
    }

}
