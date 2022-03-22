<?php

namespace App\Prowork\Rastreio\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class RasMovimentacao extends Model {
	use PresentableTrait;

	protected $presenter = \App\Prowork\Base\Presenters\BasePresenter::class;
	protected $fillable = array('data_evento', 'status', 'descricao', 'ras_objeto_id');

	public function ras_objeto() {

		return $this->belongsTo('App\Prowork\Rastreio\Models\RasObjeto');

	}

}
