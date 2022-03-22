<?php

namespace App\Prowork\BibliotecaVirtual\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class BvArquivo extends Model
{
    use PresentableTrait;
    protected $presenter = \App\Prowork\BibliotecaVirtual\Presenters\BvPresenter::class;
    
   protected $fillable = array('nome', 'descricao', 'arquivo', 'bv_pasta_id');

	public function bv_pasta() {
		return $this->belongsTo('App\Prowork\BibliotecaVirtual\Models\BvPasta');
	}
}
