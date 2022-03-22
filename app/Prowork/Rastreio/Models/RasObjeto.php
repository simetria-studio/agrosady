<?php

namespace App\Prowork\Rastreio\Models;

use Illuminate\Database\Eloquent\Model;

class RasObjeto extends Model {

	protected $fillable = array('cod_obj', 'dacte', 'user_id', 'num_cte');

	public function movimentacoes() {
		return $this->hasMany('App\Prowork\Rastreio\Models\RasMovimentacao');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

}
