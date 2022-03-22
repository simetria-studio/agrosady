<?php

use App\Prowork\Institucional\Models\Institucional;
use Illuminate\Database\Seeder;

class InstitucionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $paginas = array(
            'Quem-Somos',
            );
        $titulos = array(
            'Quem Somos',
            );
        foreach (range(0, 0) as $i) {
            
             Institucional::create(
                    [
                        'pagina' => $paginas[$i],
                        'titulo' => $titulos[$i],
                    ]
            );
             
        }
    }
}
