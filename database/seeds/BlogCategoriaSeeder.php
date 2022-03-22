<?php

use App\Prowork\Blog\Models\BlogCategoria;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BlogCategoriaSeeder extends Seeder {

    public function run() {
        DB::table('blog_categoria_blog_post')->delete();
        DB::table('blog_categorias')->delete();
        $faker = Faker::create();

        foreach (range(1, 3) as $i) {
            BlogCategoria::create(
                    [
                        'nome' => $faker->name(),
                        'descricao' => $faker->paragraph($nbSentences = 20),
                    ]
            );
        }
    }

}
