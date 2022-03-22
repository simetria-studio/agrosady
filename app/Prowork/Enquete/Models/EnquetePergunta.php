<?php

namespace App\Prowork\Enquete\Models;

use Illuminate\Database\Eloquent\Model;

class EnquetePergunta extends Model {
	protected $fillable = array('pergunta', 'opcao_correta');

	public function opcoes() {
		return $this->hasMany('App\Prowork\Enquete\Models\EnqueteOpcao');
	}

	public function respostas() {
		return $this->hasMany('App\Prowork\Enquete\Models\EnqueteResposta');
	}
}
