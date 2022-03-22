<?php

namespace App\Prowork\BibliotecaVirtual\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Laracasts\Presenter\PresentableTrait;

class BvPasta extends Model implements SluggableInterface {

    use PresentableTrait;
    protected $presenter = \App\Prowork\BibliotecaVirtual\Presenters\BvPresenter::class;
    
    protected $fillable = array('nome', 'descricao');

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'nome',
        'save_to' => 'slug',
    ];

    public function arquivos() {
        return $this->hasMany('App\Prowork\BibliotecaVirtual\Models\BvArquivo');
    }

}
