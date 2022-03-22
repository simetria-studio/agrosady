<?php
namespace App\Prowork\Blog\Repositories;

use App\Prowork\Blog\Interfaces\BlogCategoriaInterface;
use App\Prowork\Blog\Models\BlogCategoria;
use DB;

class BlogCategoriaRepository implements BlogCategoriaInterface {

	public function index() {
		$categorias = BlogCategoria::all();
                return $categorias;
	}

	public function show($id) {
		$categoria = BlogCategoria::find($id);
		return $categoria;
	}

	public function store($input) {
		try {
			BlogCategoria::create($input);
			return true;
		} catch (Exception $e) {
			return false;
		}

	}

	public function getBySlug($slug){
		$categoria = BlogCategoria::findBySlug($slug);
		return $categoria;
	}

	public function update($input, $id) {
		try {
			$categoria = BlogCategoria::find($id);
			$categoria->update($input);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function destroy($id) {
		DB::beginTransaction();
		try {
			$categoria = BlogCategoria::find($id);
			$categoria->posts()->detach();
			$categoria->posts()->delete();
			$categoria->delete();
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollBack();
			return false;
		}

	}

	public function paginate($filtros = array(), $qtdPorPag, $orderBy = array()) {
		if (isset($filtros['filtro_pesquisa'])) {
			$categorias = BlogCategoria::where('nome', 'like', '%' . $filtros['filtro_pesquisa'] . '%')->paginate($qtdPorPag);
		} else {
			$categorias = BlogCategoria::paginate($qtdPorPag);
		}

		return $categorias;
	}

	public function dataForSelect() {
		$categorias = BlogCategoria::lists('nome', 'id')->all();
		return $categorias;
	}

}