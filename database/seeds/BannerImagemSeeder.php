<?php

use App\Prowork\Banner\Models\Banner;
use App\Prowork\Banner\Models\BannerImagem;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BannerImagemSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();


        $banner = Banner::All();

        foreach ($banner as $val) {

            foreach (range(1, 5) as $i) {
                $imagem = new BannerImagem();
                $imagem->caminho = 'banner/imagens/' . rand(1, 3) . '.jpg';
                $val->imagens()->save($imagem);
            }
        }
    }

}
