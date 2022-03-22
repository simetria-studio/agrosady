<?php

namespace App\Prowork\Enquete\Models;

use Illuminate\Database\Eloquent\Model;

class EnqueteOpcao extends Model {
	protected $fillable = array('opcao', 'enquete_pergunta_id');

	public function enquete_pergunta() {
		return $this->belongsTo('App\Prowork\Enquete\Models\EnquetePergunta');
	}

	public function respostas() {
		return $this->hasMany('App\Prowork\Enquete\Models\EnqueteResposta');
	}
}
