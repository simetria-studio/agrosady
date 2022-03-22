<?php

namespace App\Prowork\Produtos\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;

class Produto extends Model implements SluggableInterface{

    use PresentableTrait;

    use SluggableTrait;

    protected $presenter = \App\Prowork\Produtos\Presenters\ProdutoPresenter::class;
    protected $fillable = array('nome', 'preco', 'preco_promocional', 'data_promocao', 'descricao', 'imagem_destaque', 'imagem_banner');
    protected $sluggable = [
        'build_from' => 'nome',
        'save_to' => 'slug',
    ];

    public function categorias() {
        return $this->belongsToMany('App\Prowork\Produtos\Models\ProdutoCategoria');
    }

    public function imagens() {
        return $this->hasMany('App\Prowork\Produtos\Models\ProdutoImagem');
    }

    public function atributos() {
        return $this->hasMany('App\Prowork\Produtos\Models\ProdutoAtributo');
    }
    

}
