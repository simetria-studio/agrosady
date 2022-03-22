<?php

namespace App\Prowork\GaleriaEvento\Models;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class GaleriaEvento extends Model
{
    use PresentableTrait;

    protected $presenter = \App\Prowork\GaleriaEvento\Presenters\GaleriaEventoPresenter::class;
    protected $fillable = array('titulo', 'data', 'hora', 'local', 'imagem', 'descricao');

}
