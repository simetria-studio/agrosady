<?php

namespace App\Prowork\Seo\Models;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Seo extends Model
{
    use PresentableTrait;

    protected $presenter = \App\Prowork\Seo\Presenters\SeoPresenter::class;
    protected $fillable = array('seo_pagina', 'seo_title', 'seo_description', 'seo_keywords');

}
