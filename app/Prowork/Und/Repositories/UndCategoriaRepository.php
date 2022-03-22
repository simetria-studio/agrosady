<?php
namespace App\Prowork\Und\Repositories;

use App\Prowork\Und\Interfaces\UndCategoriaInterface;
use App\Prowork\Und\Models\UndCategoria;
use DB;

class UndCategoriaRepository implements UndCategoriaInterface {

	public function index() {
		$categorias = UndCategoria::all();
                return $categorias;
	}

	public function show($id) {
		$categoria = UndCategoria::find($id);
		return $categoria;
	}

	public function store($input) {
		try {
			UndCategoria::create($input);
			return true;
		} catch (Exception $e) {
			return false;
		}

	}

	public function update($input, $id) {
		try {
			$categoria = UndCategoria::find($id);
			$categoria->update($input);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function destroy($id) {
		DB::beginTransaction();
		try {
			$categoria = UndCategoria::find($id);
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

	public function getBySlug($slug){
		$categoria = UndCategoria::findBySlug($slug);
		return $categoria;
	}

	public function paginate($filtros = array(), $qtdPorPag, $orderBy = array()) {
		if (isset($filtros['filtro_pesquisa'])) {
			$categorias = UndCategoria::where('nome', 'like', '%' . $filtros['filtro_pesquisa'] . '%')->paginate($qtdPorPag);
		} else {
			$categorias = UndCategoria::paginate($qtdPorPag);
		}

		return $categorias;
	}

	public function dataForSelect() {
		$categorias = UndCategoria::lists('nome', 'id')->all();
		return $categorias;
	}

}