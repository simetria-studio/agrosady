<?php
namespace App\Prowork\Blog\Presenters;

use App\Prowork\Base\Presenters\BasePresenter;

class BlogPostPresenter extends BasePresenter {

	public function formatCategorias($categorias){
		$cat = '';
		for($i=0; $i<count($categorias); $i++){
			$cat.= $i == count($categorias)-1?$categorias[$i]->nome:$categorias[$i]->nome.', ';
		}
		return $cat;
	} 	

}