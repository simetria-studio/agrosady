<?php

namespace App\Prowork\Enquete\Models;

use Illuminate\Database\Eloquent\Model;

class EnqueteResposta extends Model {
	protected $fillable = array('resposta', 'user_id', 'enquete_pergunta_id', 'enquete_opcao_id');

	public function enquete_pergunta() {
		return $this->belongsTo('App\Prowork\Enquete\Models\EnquetePergunta');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function enquete_opcao() {
		return $this->belongsTo('App\Prowork\Enquete\Models\EnqueteOpcao');
	}
}
