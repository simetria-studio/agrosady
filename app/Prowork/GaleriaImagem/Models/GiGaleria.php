<?php

namespace App\Prowork\GaleriaImagem\Models;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class GiGaleria extends Model implements SluggableInterface {
    use PresentableTrait;

    protected $presenter = \App\Prowork\GaleriaImagem\Presenters\GaleriaImagemPresenter::class;
    protected $fillable = array('titulo', 'descricao', 'img_capa');

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'titulo',
        'save_to' => 'slug',
    ];
    
    public function imagens(){

        return $this->hasMany('App\Prowork\GaleriaImagem\Models\GiImagem');
        
    }
    
    
    
}
