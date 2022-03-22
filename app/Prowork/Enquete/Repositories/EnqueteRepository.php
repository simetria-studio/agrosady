<?php

namespace App\Prowork\Enquete\Repositories;

use App\Prowork\Enquete\Models\EnqueteOpcao;
use App\Prowork\Enquete\Models\EnquetePergunta;
use App\Prowork\Enquete\Models\EnqueteResposta;
use DB;

class EnqueteRepository {

    public function show($id) {
        $enquete = EnquetePergunta::find($id);
        return $enquete;
    }

    public function store($input, $opcoes) {
        DB::beginTransaction();
        try {

            $pergunta = EnquetePergunta::create($input);

            $alternativas = array();
            foreach ($opcoes['opcoes'] as $op) {
                $opc = new EnqueteOpcao(['opcao' => $op]);
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
            $pergunta = EnquetePergunta::find($id);
            $pergunta->respostas()->delete();
            $pergunta->opcoes()->delete();
            $pergunta->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function enviarResposta($input) {
        $resposta = EnqueteResposta::where('user_id', $input['user_id'])->where('enquete_pergunta_id', $input['enquete_pergunta_id'])->get();
        if ($resposta->isEmpty()) {
            EnqueteResposta::create($input);
            return true;
        }
        return false;
    }

    public function paginate($filtros = array(), $qtdPorPag) {
        $enquetes = EnquetePergunta::whereHas('opcoes', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
                        $query->where('pergunta', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->with('opcoes')
                ->paginate($qtdPorPag);

        return $enquetes;
//		$enquetes = EnquetePergunta::where(function ($query) use (&$filtros) {
//			if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
//				$query->where('pergunta', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
//			}
//		})
//			->orderBy('id', 'asc')
//			->paginate($qtdPorPag);
//
//        return $enquetes;
    }

}
