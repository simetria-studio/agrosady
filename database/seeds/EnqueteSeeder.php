<?php

use App\Prowork\Enquete\Models\EnquetePergunta;
use App\Prowork\Enquete\Models\EnqueteOpcao;
use Illuminate\Database\Seeder;

class EnqueteSeeder extends Seeder {

    public function run() {
        DB::table('enquete_respostas')->delete();
        DB::table('enquete_opcaos')->delete();
        DB::table('enquete_perguntas')->delete();


        EnquetePergunta::create(
                [
                    'pergunta' => 'Ferri facilis scriptorem has ne. Homero tractatos ius ea, ullum iudico dicunt ei nam, signiferumque necessitatibus no nec?',
                ]
        );

        $opcoes = array();
        $opcoes[0] = new EnqueteOpcao();
        $opcoes[0]->opcao = 'No summo omnesque percipitur usu';
        $opcoes[1] = new EnqueteOpcao();
        $opcoes[1]->opcao = 'Elitr quodsi conceptam an qui';
        $opcoes[2] = new EnqueteOpcao();
        $opcoes[2]->opcao = 'Officiis quo eligendi rem autem totam vel est ipsum.';

        $enquetes = EnquetePergunta::query()->get();

        foreach ($enquetes as $enquete) {
            $enquete->opcoes()->saveMany($opcoes);
        }
    }

}
