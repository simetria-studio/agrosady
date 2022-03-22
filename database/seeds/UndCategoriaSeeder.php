<?php

use App\Prowork\Und\Models\UndCategoria;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UndCategoriaSeeder extends Seeder {

    public function run() {
        DB::table('und_categoria_und_post')->delete();
        DB::table('und_categorias')->delete();
        $faker = Faker::create();

        foreach (range(1, 3) as $i) {
            UndCategoria::create(
                    [
                        'nome' => $faker->name(),
                        'descricao' => $faker->paragraph($nbSentences = 20),
                    ]
            );
        }
    }

}
