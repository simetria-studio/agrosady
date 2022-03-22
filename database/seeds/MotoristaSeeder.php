<?php

use App\Prowork\Motorista\Models\Motorista;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MotoristaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('motoristas')->delete();
        $faker = Faker::create();

        foreach (range(1, 5) as $i) {
            Motorista::create(
                    [
                        'nome' => $faker->name(),
                        'email' => $faker->email,
                        'telefone' => $faker->phoneNumber,
                        'veiculo' => $faker->randomElement($array = array ('Scania R440','Mercedes 710','Volvo FH 460', 'Volks 24250')),
                        'rota' => $faker->randomElement($array = array ('Salvador - São Paulo','Salvador - Rio de Janeiro','Vitória da Conquista - Salvador')),
                        'observacoes' => $faker->paragraph($nbSentences = 3),
                    ]
            );
        }
    }

}
