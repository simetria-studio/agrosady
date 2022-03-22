<?php

namespace App\Prowork\Produtos\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoAtributo extends Model {
	protected $fillable = array('nome', 'valor', 'produto_id');

	public function produto() {
		return $this->belongsTo('App\Prowork\Produtos\Models\Produto');
	}
}
