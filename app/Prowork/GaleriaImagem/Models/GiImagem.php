<?php

namespace App\Prowork\GaleriaImagem\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class GiImagem extends Model {

    use PresentableTrait;

    protected $presenter = \App\Prowork\GaleriaImagem\Presenters\GaleriaImagemPresenter::class;
    protected $fillable = array('caminho', 'gi_galeria_id');

    public function gi_galeria() {

        return $this->belongsTo('App\Prowork\GaleriaImagem\Models\GiGaleria');
    }

}
