<?php

use App\Prowork\Banner\Models\Banner;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('banner_imagems')->delete();
        DB::table('banners')->delete();
        $faker = Faker::create();

        Banner::create(
                [
                    'nome' => $faker->name(),
                    'descricao' => $faker->paragraph($nbSentences = 4),
                ]
        );
    }

}
