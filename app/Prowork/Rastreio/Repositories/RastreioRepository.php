<?php

namespace App\Prowork\Rastreio\Repositories;

use App\Prowork\Base\Repositories\FileRepository;
use App\Prowork\Rastreio\Models\RasMovimentacao;
use App\Prowork\Rastreio\Models\RasObjeto;
use App\User;
use Auth;
use Config;
use DB;
use Illuminate\Support\Facades\Storage;

class RastreioRepository {

    protected $fileRepository;

    public function __construct(FileRepository $fileRepository) {
        $this->fileRepository = $fileRepository;
    }

    public function index() {
        $objetos = RasObjeto::all();
        return $objetos;
    }

    public function showObjeto($id) {
        $objeto = RasObjeto::find($id);
        return $objeto;
    }

    public function storeObjeto($input) {
        DB::beginTransaction();
        try {

            if (isset($input['dacte'])) {
                $file = $this->fileRepository->sendFile($input['dacte'], 'rastreio/', Config::get('prowork.projeto'));
                $input['dacte'] = $file;
            }
            $objeto = RasObjeto::create($input);
            DB::commit();
            return $objeto;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyObjeto($id) {
        DB::beginTransaction();
        try {
            $objeto = RasObjeto::find($id);
            $this->deletaDacteS3($objeto);
            $objeto->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    
    public function deletaDacteS3($objeto) {
        try {
            Storage::disk('s3')->delete(Config::get('prowork.projeto') . $objeto->dacte);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function paginateObjeto($filtros = array(), $qtdPorPag) {
        if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {

            $objeto = RasObjeto::where(function ($query) use (&$filtros) {
                        $query->where('cod_obj', '=', $filtros['filtro_pesquisa']);
                        $query->orWhere('id', '=', $filtros['filtro_pesquisa']);
                        (Auth::user()->hasPermission('rastreio.visualizar') ||
                                Auth::user()->hasPermission('rastreio.editar') ||
                                Auth::user()->hasPermission('rastreio.criar') ||
                                Auth::user()->hasPermission('rastreio.total')) ? '' : $query->Where('user_id', '=', Auth::id());
                    })->orderBy('created_at', 'desc')->paginate($qtdPorPag);
        } else {
            $objeto = RasObjeto::where(function ($query) {
                        (Auth::user()->hasPermission('rastreio.visualizar') ||
                                Auth::user()->hasPermission('rastreio.editar') ||
                                Auth::user()->hasPermission('rastreio.criar') ||
                                Auth::user()->hasPermission('rastreio.total')) ? '' : $query->Where('user_id', '=', Auth::id());
                    })->orderBy('created_at', 'desc')->paginate($qtdPorPag);
        }

        return $objeto;
    }

    public function dataForSelect() {
        $usuarios = User::lists('name', 'id')->all();
        return $usuarios;
    }

    /** MÉTODOS MOVIMENTAÇÃO * */
    public function storeMovimentacao($input) {
        $id_objeto = $input['id'];
        unset($input['id']);
        //tratando data para enviar pro banco
        $input['data_evento'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_evento'])));
        DB::beginTransaction();
        try {
            $Objeto = RasObjeto::find($id_objeto);

            $movimentacao = new RasMovimentacao();
            $movimentacao->data_evento = $input['data_evento'];
            $movimentacao->status = $input['status'];
            $movimentacao->descricao = $input['descricao'];
            $Objeto->movimentacoes()->save($movimentacao);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

}
