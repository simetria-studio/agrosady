<?php

namespace App\Prowork\Motorista\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Motorista extends Model {
	use PresentableTrait;

	protected $presenter = \App\Prowork\Base\Presenters\BasePresenter::class;
	protected $fillable = array('nome', 'email', 'telefone', 'veiculo', 'rota', 'observacoes');
}
