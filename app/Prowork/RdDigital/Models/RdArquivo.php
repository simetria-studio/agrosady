<?php

namespace App\Prowork\RdDigital\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class RdArquivo extends Model {

    use PresentableTrait;
    protected $presenter = \App\Prowork\Base\Presenters\BasePresenter::class;
    protected $fillable = array('nome', 'ano', 'armazenamento', 'regiao', 'campanha', 'setor', 'arquivo');


}
