<?php

namespace App\Prowork\GaleriaVideo\Models;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class GvGaleria extends Model implements SluggableInterface {
    
    use PresentableTrait;

    protected $presenter = \App\Prowork\GaleriaVideo\Presenters\GaleriaVideoPresenter::class;
    protected $fillable = array('titulo', 'descricao', 'img_capa');

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'titulo',
        'save_to' => 'slug',
    ];
    
    public function videos(){

        return $this->hasMany('App\Prowork\GaleriaVideo\Models\GvVideo');
        
    }
    
    
    
}
