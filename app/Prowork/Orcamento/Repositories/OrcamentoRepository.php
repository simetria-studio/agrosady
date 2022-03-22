<?php

namespace App\Prowork\Orcamento\Repositories;

use App\Prowork\Orcamento\Models\OrcColeta;
use App\Prowork\Orcamento\Models\OrcOrcamento;
use Auth;
use Artesaos\Defender\Defender;
use DB;

class OrcamentoRepository {

    public function index() {
        $orcamento = OrcOrcamento::all();
        return $orcamento;
    }

    public function showOrcamento($id) {
        $orcamento = OrcOrcamento::find($id);
        return $orcamento;
    }

    public function storeOrcamento($input) {
        $input['status'] = 'Pendente';
        $input['user_id'] = Auth::id();
        //tratando valor para o banco
        $valor_nota = str_replace('R$ ', '', $input['valor_nota']);
        $valor_nota = str_replace('.', '', $valor_nota);
        $valor_nota = str_replace(',', '.', $valor_nota);
        $input['valor_nota'] = $valor_nota;

        DB::beginTransaction();
        try {
            $orcamento = OrcOrcamento::create($input);
            DB::commit();
            return $orcamento;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateOrcamento($input, $id) {

        //tratando valor para o banco
        $valor_nota = str_replace('R$ ', '', $input['valor_nota']);
        $valor_nota = str_replace('.', '', $valor_nota);
        $valor_nota = str_replace(',', '.', $valor_nota);
        $input['valor_nota'] = $valor_nota;

        DB::beginTransaction();
        try {
            $orcamento = OrcOrcamento::find($id);
            $orcamento->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function editStatusOrcamento($id, $status) {

        DB::beginTransaction();
        try {
            $orcamento = OrcOrcamento::find($id);
            $orcamento->status = $status;
            $orcamento->save();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyOrcamento($id) {
        DB::beginTransaction();
        try {
            $orcamento = OrcOrcamento::find($id);
            $orcamento->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginateOrcamento($filtros = array(), $qtdPorPag) {
        if (isset($filtros['filtro_pesquisa'])) {

            $orcamento = OrcOrcamento::where(function ($query) use (&$filtros) {
                        $query->where('id', 'like', '%' . $filtros['filtro_pesquisa'] . '%');
                        (Auth::user()->hasPermission('orcamento.visualizar') ||
                                Auth::user()->hasPermission('orcamento.editar') ||
                                Auth::user()->hasPermission('orcamento.criar') ||
                                Auth::user()->hasPermission('orcamento.total')) ? '' : $query->Where('user_id', '=', Auth::id());
                    })->orderBy('id', 'desc')->paginate($qtdPorPag);
        } else {

            $orcamento = OrcOrcamento::where(function ($query) {
                        (Auth::user()->hasPermission('orcamento.visualizar') ||
                                Auth::user()->hasPermission('orcamento.editar') ||
                                Auth::user()->hasPermission('orcamento.criar') ||
                                Auth::user()->hasPermission('orcamento.total')) ? '' : $query->Where('user_id', '=', Auth::id());
                    })->orderBy('id', 'desc')->paginate($qtdPorPag);
        }

        return $orcamento;
    }

    /** MÉTODOS COLETA * */
    public function listColeta() {
        return $coleta = OrcColeta::all();
    }

    public function showColeta($id) {
        $coleta = OrcColeta::find($id);
        return $coleta;
    }

    public function storeColeta($input) {
        $input['status'] = 'Pendente';
        $input['user_id'] = Auth::id();

        //tratando data para enviar pro banco

        $input['data_coleta'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_coleta'])));
        DB::beginTransaction();
        try {
            $coleta = OrcColeta::create($input);
            DB::commit();
            return $coleta;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateColeta($input, $id) {
        //tratando data para enviar pro banco
        $input['data_coleta'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_coleta'])));
        DB::beginTransaction();
        try {
            $coleta = OrcColeta::find($id);
            $coleta->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function editStatusColeta($id, $status) {

        DB::beginTransaction();
        try {
            $coleta = OrcColeta::find($id);
            $coleta->status = $status;
            $coleta->save();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyColeta($id) {
        DB::beginTransaction();
        try {
            $coleta = OrcColeta::find($id);
            $coleta->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginateColeta($filtros = array(), $qtdPorPag) {
        if (isset($filtros['filtro_pesquisa'])) {

            $coleta = OrcColeta::where(function ($query) use (&$filtros) {
                        $query->where('id', 'like', '%' . $filtros['filtro_pesquisa'] . '%');
                        (Auth::user()->hasPermission('orcamento.visualizar') ||
                                Auth::user()->hasPermission('orcamento.editar') ||
                                Auth::user()->hasPermission('orcamento.criar') ||
                                Auth::user()->hasPermission('orcamento.total')) ? '' : $query->Where('user_id', '=', Auth::id());
                    })->orderBy('id', 'desc')->paginate($qtdPorPag);
        } else {

            $coleta = OrcColeta::where(function ($query) {
                        (Auth::user()->hasPermission('orcamento.visualizar') ||
                                Auth::user()->hasPermission('orcamento.editar') ||
                                Auth::user()->hasPermission('orcamento.criar') ||
                                Auth::user()->hasPermission('orcamento.total')) ? '' : $query->Where('user_id', '=', Auth::id());
                    })->orderBy('id', 'desc')->paginate($qtdPorPag);
        }

        return $coleta;
    }

}
