<?php

namespace App\Prowork\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class BannerImagem extends Model {
	use PresentableTrait;

	protected $presenter = \App\Prowork\Banner\Presenters\BannerPresenter::class;
	protected $fillable = array('nome', 'caminho', 'banner_id', 'data_inicio', 'data_fim', 'link');

	public function banner() {

		return $this->belongsTo('App\Prowork\Banner\Models\Banner');
	}
}
