<?php

use App\Prowork\Und\Models\UndCategoria;
use App\Prowork\Und\Models\UndPost;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UndPostSeeder extends Seeder {

    public function run() {
        DB::table('und_categoria_und_post')->delete();
        DB::table('und_opcaos')->delete();
        DB::table('und_respostas')->delete();
        DB::table('und_perguntas')->delete();
        DB::table('und_posts')->delete();
        $faker = Faker::create();

        $categorias = UndCategoria::query()->get(['id'])->lists('id');

        foreach (range(1, 20) as $i) {

            $post = new UndPost();
            $post->data_publicacao = $faker->dateTime($max = 'now');
            $post->titulo = $faker->sentence($nbWords = 10);
            $post->descricao = $faker->paragraph($nbSentences = 50);
            $post->autor = $faker->name();
            $post->save();
            $post->categorias()->attach($categorias->random());
        }
    }

}
