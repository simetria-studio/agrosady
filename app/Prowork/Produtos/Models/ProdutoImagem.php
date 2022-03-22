<?php

namespace App\Prowork\Produtos\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class ProdutoImagem extends Model {

    use PresentableTrait;

    protected $presenter = \App\Prowork\Produtos\Presenters\ProdutoPresenter::class;
    protected $fillable = array('caminho', 'produto_id');

    public function produto() {
        return $this->belongsTo('App\Prowork\Produtos\Models\Produto');
    }

}
