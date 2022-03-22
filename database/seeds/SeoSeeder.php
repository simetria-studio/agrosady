<?php

use App\Prowork\Seo\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $paginas = array(
            'Home', 
            'QuemSomos', 
            'Notícias', 
            'Produtos', 
            'GaleriaImagens',
            'Contato',
            );
        foreach (range(0, 5) as $i) {
            
             Seo::create(
                    [
                        'seo_pagina' => $paginas[$i],
                    ]
            );
             
        }
    }
}
