<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

//		$this->call(BannerSeeder::class);
//		$this->call(BannerImagemSeeder::class);
//		$this->call(BibliotecaVirtualSeeder::class);
//		$this->call(BlogCategoriaSeeder::class);
//		$this->call(BlogPostSeeder::class);
//		$this->call(EnqueteSeeder::class);
//		$this->call(GaleriaEventoSeeder::class);
//		$this->call(GiGaleriaSeeder::class);
//		$this->call(GiImagemSeeder::class);
//		$this->call(GvGaleriaSeeder::class);
//		$this->call(GvVideoSeeder::class);
//		$this->call(MotoristaSeeder::class);
//		$this->call(UndCategoriaSeeder::class);
//		$this->call(UndPostSeeder::class);
                $this->call(UserSeeder::class);
                $this->call(UserPermissoesSeeder::class);
                $this->call(SeoSeeder::class);
                $this->call(InstitucionalSeeder::class);

        Model::reguard();
    }

}
