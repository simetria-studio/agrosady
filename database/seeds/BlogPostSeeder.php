<?php

use Illuminate\Database\Seeder;
use App\Prowork\Blog\Models\BlogPost;
use App\Prowork\Blog\Models\BlogCategoria;
use Faker\Factory as Faker;

class BlogPostSeeder extends Seeder {

    public function run() {
        DB::table('blog_categoria_blog_post')->delete();
        DB::table('blog_posts')->delete();
        $faker = Faker::create();


        $categorias = BlogCategoria::query()->get(['id'])->lists('id');

        foreach (range(1, 20) as $i) {
            $post = new BlogPost();
            $post->data_publicacao = $faker->dateTime($max = 'now');
            $post->titulo = $faker->sentence($nbWords = 10);
            $post->descricao = $faker->paragraph($nbSentences = 50);
            $post->autor = $faker->name();
            $post->save();
            $post->categorias()->attach($categorias->random());
        }
    }

}
