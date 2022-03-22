<?php

namespace App\Prowork\Orcamento\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class OrcColeta extends Model
{
	use PresentableTrait;
	protected $presenter = \App\Prowork\Base\Presenters\BasePresenter::class;
    protected $fillable = array('data_coleta', 'local', 'orcamento', 'observacao', 'status', 'user_id');
    
}
