<?php
namespace App\Prowork\Und\Repositories;

use App\Prowork\Und\Models\UndOpcao;
use App\Prowork\Und\Models\UndPergunta;
use App\Prowork\Und\Models\UndResposta;
use DB;

class UndProvaRepository {

	public function show($id) {
		$post = UndPost::with('categorias')->find([$id]);
		return $post;
	}

	public function store($input, $opcoes) {
		DB::beginTransaction();
		try {

			$pergunta = UndPergunta::create($input);

			$alternativas = array();
			foreach ($opcoes['opcoes'] as $op) {
				$opc = new UndOpcao(['opcao' => $op]);
				$alternativas[] = $opc;
			}
			$pergunta->opcoes()->saveMany($alternativas);
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
			$pergunta = UndPergunta::find($id);
			$pergunta->opcoes()->delete();
			$pergunta->respostas()->delete();
			$pergunta->delete();
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollBack();
			return false;
		}

	}

	public function paginate($filtros = array(), $qtdPorPag, $id_post) {
		$posts = UndPergunta::where(function ($query) use (&$filtros, &$id_post) {
			$query->where('und_post_id', $id_post);
			if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
				$query->where('pergunta', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
			}
		})
		/*	->whereHas('categorias', function ($query) use (&$filtros) {
		if (isset($filtros['filtro_categoria']) && $filtros['filtro_categoria'] != '') {
		$query->where('und_categoria_id', '=', $filtros['filtro_categoria']);
		}
		})*/
			->orderBy('id', 'asc')
			->paginate($qtdPorPag);

		return $posts;
	}
        
        public function enviarResposta($input) {
        $respostas = UndResposta::where('user_id', $input[0]['user_id'])->where('und_pergunta_id', $input[0]['und_pergunta_id'])->get();
        if ($respostas->isEmpty()) {
            UndResposta::insert($input);
            return true;
        }
        return false;
    }

}