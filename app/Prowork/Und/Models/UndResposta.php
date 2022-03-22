<?php

namespace App\Prowork\Und\Models;

use Illuminate\Database\Eloquent\Model;

class UndResposta extends Model {

	protected $fillable = array('resposta', 'user_id', 'und_pergunta_id');

	public function und_pergunta() {
		return $this->belongsTo('App\Prowork\Und\Models\UndPergunta');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
