<?php

namespace App\Prowork\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BlogPost extends Model implements SluggableInterface{
	use PresentableTrait;

	use SluggableTrait;

    

	protected $presenter = \App\Prowork\Blog\Presenters\BlogPostPresenter::class;
	protected $fillable = array('data_publicacao', 'titulo', 'subtitulo', 'descricao', 'autor', 'imagem_destaque');
	protected $sluggable = [
        'build_from' => 'titulo',
        'save_to'    => 'slug',
    ];

    public function categorias() {
        return $this->belongsToMany('App\Prowork\Blog\Models\BlogCategoria');
    }
    public function usuario() {
        return $this->belongsToMany('App\User')->withTimestamps();;
    }

}
