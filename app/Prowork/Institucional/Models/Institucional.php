<?php

namespace App\Prowork\Institucional\Models;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Institucional extends Model implements SluggableInterface
{
    use PresentableTrait;
    use SluggableTrait;

    protected $presenter = \App\Prowork\Institucional\Presenters\InstitucionalPresenter::class;
    protected $fillable = array('pagina', 'titulo', 'conteudo');
    
    protected $sluggable = [
        'build_from' => 'titulo',
        'save_to'    => 'slug',
    ];

}
