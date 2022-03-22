<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run() {
        DB::table('und_respostas')->delete();
        DB::table('users')->delete();
        $user = User::create([
            'name' => 'Usuário Master',
            'email' => 'donagraca@agenciadonagraca.com',
            'password' => bcrypt('#adg_1012*'),
        ]);
        
    }

}
