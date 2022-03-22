<?php

namespace App\Prowork\GaleriaVideo\Models;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class GvVideo extends Model
{
    use PresentableTrait;

    protected $presenter = \App\Prowork\GaleriaVideo\Presenters\GaleriaVideoPresenter::class;
    protected $fillable = array('titulo','caminho', 'gv_galeria_id');
    
    
    public function gv_galeria(){

        return $this->belongsTo('App\Prowork\GaleriaVideo\Models\GvGaleria');
        
    }
    
    
    
}
