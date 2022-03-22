<?php

namespace App\Prowork\Und\Models;

use Illuminate\Database\Eloquent\Model;

class UndPergunta extends Model {
	protected $fillable = array('pergunta', 'descricao', 'opcao_correta', 'und_post_id');

	public function und_post() {
		return $this->belongsTo('App\Prowork\Und\Models\UndPost');
	}

	public function opcoes() {
		return $this->hasMany('App\Prowork\Und\Models\UndOpcao');
	}

	public function respostas() {
		return $this->hasMany('App\Prowork\Und\Models\UndResposta');
	}
}
