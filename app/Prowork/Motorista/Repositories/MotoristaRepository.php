<?php

namespace App\Prowork\Motorista\Repositories;

use App\Prowork\Motorista\Models\Motorista;
use DB;

class MotoristaRepository {
	public function index() {
		$motoristas = Motorista::all();
	}

	public function show($id) {
		$motorista = Motorista::find($id);
		return $motorista;
	}

	public function store($input) {

		DB::beginTransaction();
		try {
			$motorista = Motorista::create($input);
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollBack();
			return false;
		}
	}

	public function update($input, $id) {
		DB::beginTransaction();
		try {
			$motorista = Motorista::find($id);
			$motorista->update($input);
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollBack();
			return false;
		}
	}

	public function destroy($id) {
		DB::beginTransaction();
		try {
			$motorista = Motorista::find($id);
			$motorista->delete();
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollBack();
			return false;
		}
	}

	public function paginate($filtros = array(), $qtdPorPag) {

		$motoristas = Motorista::where(function ($query) use (&$filtros, &$orderBy) {
			if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
				$query->where('nome', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
				$query->orWhere('rota', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
				$query->orWhere('veiculo', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
			}
		})

			->orderBy('nome', 'asc')
			->paginate($qtdPorPag);

		return $motoristas;
	}

}
