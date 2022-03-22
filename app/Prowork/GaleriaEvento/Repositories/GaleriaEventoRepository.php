<?php

namespace App\Prowork\GaleriaEvento\Repositories;

use App\Prowork\GaleriaEvento\Models\GaleriaEvento;
use App\Prowork\Base\Repositories\ImageRepository;
use DB;
use Config;
use Illuminate\Support\Facades\Storage;

class GaleriaEventoRepository {
    
    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function index() {
        $evento = GaleriaEvento::all();
        return $evento;
    }

    public function showEvento($id) {
        $evento = GaleriaEvento::find($id);
        return $evento;
    }

    public function storeEvento($input, $thumbs = array()) {
        if (isset($input['imagem'])) {
            $imagem = $this->imageRepository->sendImage($input['imagem'], 'eventos/imagens/', Config::get('prowork.projeto'), $thumbs);
            $input['imagem'] = $imagem;
        }
        
        $input['data'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data'])));

        DB::beginTransaction();
        try {
            $eventos = GaleriaEvento::create($input);
            DB::commit();
            return $eventos;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateEvento($input, $id, $thumbs = array()) {
        if (isset($input['imagem'])) {
            $imagem = $this->imageRepository->sendImage($input['imagem'], 'eventos/imagens/', Config::get('prowork.projeto'), $thumbs);
            $input['imagem'] = $imagem;
            $this->deleteImagemS3(GaleriaEvento::find($id));
        }
        
        $input['data'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data'])));

        DB::beginTransaction();
        try {
            $evento = GaleriaEvento::find($id);
            $evento->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyEvento($id) {
        DB::beginTransaction();
        try {
            $evento = GaleriaEvento::find($id);
            $this->deleteImagemS3($evento);
            $evento->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginateEvento($filtros = array(), $qtdPorPag, $orderBy = array()) {
         if (!$orderBy) {
            $orderBy = array('data','asc');
        }
        
        if (isset($filtros['filtro_pesquisa'])) {
            $eventos = GaleriaEvento::where('titulo', 'like', '%' . $filtros['filtro_pesquisa'] . '%')->orderBy($orderBy[0],$orderBy[1])->paginate($qtdPorPag);
        } else {
            $eventos = GaleriaEvento::orderBy($orderBy[0],$orderBy[1])->paginate($qtdPorPag);
        }

        return $eventos;
    }
    
    public function deleteImagemS3($evento) {
        $thumbs = array(['width' => '730', 'height' => '300']); //tumb configurado no evento controler.
        if ($evento->imagem != '') {
            $imagem = $evento->imagem;
            $nome_img = explode(".", $imagem);
            try {
                foreach ($thumbs as $val) {
                    Storage::disk('s3')->delete(Config::get('prowork.projeto') . $nome_img[0] . '_' . $val['width'] . 'x' . $val['height'] . '.' . $nome_img[1]); //deletar todos os thumbs.
                }
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem); //deleta a imagem
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    
}
