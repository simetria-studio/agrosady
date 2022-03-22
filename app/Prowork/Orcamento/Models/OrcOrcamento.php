<?php

namespace App\Prowork\Orcamento\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class OrcOrcamento extends Model
{
    use PresentableTrait;
    protected $presenter = \App\Prowork\Base\Presenters\BasePresenter::class;
    protected $fillable = array('tipo_carga', 'tomador_servico', 'origem', 'destino', 'peso', 'valor_nota', 'status', 'user_id');
    //
}
