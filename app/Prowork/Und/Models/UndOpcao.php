<?php

namespace App\Prowork\Und\Models;

use Illuminate\Database\Eloquent\Model;

class UndOpcao extends Model {
	protected $fillable = array('opcao', 'und_pergunta_id');

	public function und_pergunta() {
		return $this->belongsTo('App\Prowork\Und\Models\UndPergunta');
	}
}
