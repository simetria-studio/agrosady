<?php

use App\Prowork\BibliotecaVirtual\Models\BvPasta;
use Illuminate\Database\Seeder;

class BibliotecaVirtualSeeder extends Seeder {

    public function run() {
        DB::table('bv_arquivos')->delete();
        DB::table('bv_pastas')->delete();
        BvPasta::create(
                [
                    'nome' => 'Tecnologia',
                    'descricao' => '',
                ]
        );
        BvPasta::create(
                [
                    'nome' => 'Marketing',
                    'descricao' => '',
                ]
        );
    }

}
