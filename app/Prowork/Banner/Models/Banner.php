<?php

namespace App\Prowork\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class Banner extends Model
{
        use PresentableTrait;

    protected $presenter = \App\Prowork\Banner\Presenters\BannerPresenter::class;
    protected $fillable = array('nome', 'descricao');

    
    public function imagens(){

        return $this->hasMany('App\Prowork\Banner\Models\BannerImagem');
        
    }
}
