<?php

namespace App\Prowork\Und\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class UndCategoria extends Model implements SluggableInterface
{

	use SluggableTrait;
	
	protected $sluggable = [
        'build_from' => 'nome',
        'save_to'    => 'slug',
        ];
	protected $fillable = array('nome', 'descricao');

	 public function posts()
	{
		return $this->belongsToMany('App\Prowork\Und\Models\UndPost');
	}
}


