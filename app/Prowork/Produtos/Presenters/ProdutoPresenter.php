<?php
namespace App\Prowork\Produtos\Presenters;

use App\Prowork\Base\Presenters\BasePresenter;

class ProdutoPresenter extends BasePresenter {

	public function formatCategorias($categorias){
		$cat = '';
		for($i=0; $i<count($categorias); $i++){
			$cat.= $i == count($categorias)-1?$categorias[$i]->nome:$categorias[$i]->nome.', ';
		}
		return $cat;
	} 	

}