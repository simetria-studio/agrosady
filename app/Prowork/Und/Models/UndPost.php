<?php

namespace App\Prowork\Und\Models;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class UndPost extends Model implements SluggableInterface {
	use PresentableTrait;

	use SluggableTrait;
	
	protected $sluggable = [
        'build_from' => 'titulo',
        'save_to'    => 'slug',
    ];

	protected $presenter = \App\Prowork\Und\Presenters\UndPostPresenter::class;
	protected $fillable = array('data_publicacao', 'titulo', 'descricao', 'autor', 'imagem_destaque');
	
	public function categorias() {
		return $this->belongsToMany('App\Prowork\Und\Models\UndCategoria');
	}

	public function perguntas()
    {
        return $this->hasMany('App\Prowork\Und\Models\UndPergunta');
    }
}
