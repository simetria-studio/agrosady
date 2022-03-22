<?php

namespace App\Prowork\GaleriaImagem\Repositories;

use App\Prowork\Base\Repositories\ImageRepository;
use App\Prowork\GaleriaImagem\Models\GiGaleria;
use App\Prowork\GaleriaImagem\Models\GiImagem;
use Config;
use Illuminate\Support\Facades\Storage;
use DB;

class GaleriaImagemRepository {

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function index() {
        $galeria = GiGaleria::all();
        return $galeria;
    }

    public function showGaleria($id) {
        $galeria = GiGaleria::find($id);
        return $galeria;
    }

    public function getBySlug($slug) {
        $galeria = GiGaleria::findBySlug($slug);
        return $galeria;
    }

    public function storeGaleria($input) {

        DB::beginTransaction();
        try {
            $galeria = GiGaleria::create($input);
            DB::commit();
            return $galeria;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateGaleria($input, $id, $thumbs = array()) {
        $galeria = GiGaleria::find($id);
//        if (isset($input['img_capa'])) {
//            $img_capa = $this->imageRepository->sendImage($input['img_capa'], 'galeria-imagem/'.$galeria->slug.'/', Config::get('prowork.projeto'), $thumbs);
//            $input['img_capa'] = $img_capa;
//        }
        DB::beginTransaction();
        try {
            $galeria->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyGaleria($id) {
        DB::beginTransaction();
        try {
            $galeria = GiGaleria::find($id);
            $this->deletaGaleriaS3($galeria);
            $galeria->imagens()->delete();
            $galeria->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginateGaleria($filtros = array(), $qtdPorPag, $orderBy = array()) {
        if (!$orderBy) {
            $orderBy = array('id', 'asc');
        }
        if (isset($filtros['filtro_pesquisa'])) {
            $galeria = GiGaleria::where('titulo', 'like', '%' . $filtros['filtro_pesquisa'] . '%')->orderBy($orderBy[0], $orderBy[1])->paginate($qtdPorPag);
        } else {
            $galeria = GiGaleria::orderBy($orderBy[0], $orderBy[1])->paginate($qtdPorPag);
        }
        return $galeria;
    }

    public function dataForSelectGaleria() {
        $galeria = GiGaleria::lists('titulo', 'id')->all();
        return $galeria;
    }

    /** MÉTODOS IMAGEM * */
    public function storeImagem($input, $id, $thumbs = array()) {
        $galeria = GiGaleria::find($id);
        $caminho = $this->imageRepository->sendImage($input['file'], 'galeria-imagem/' . $galeria->slug . '/', Config::get('prowork.projeto'), $thumbs);

        DB::beginTransaction();
        try {

            if (empty($galeria->img_capa)) {
                $galeria->img_capa = $caminho;
                $galeria->save();
            }

            $imagem = new GiImagem();
            $imagem->caminho = $caminho;
            $galeria->imagens()->save($imagem);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function setImgCapaGaleria($id_imagem) {

        DB::beginTransaction();
        try {

            $imagem = GiImagem::find($id_imagem);
            $imagem->gi_galeria->img_capa = $imagem->caminho;
            $imagem->gi_galeria->save();

            DB::commit();
            return $imagem->gi_galeria->id;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyImagem($id) {
        DB::beginTransaction();
        try {
            $imagem = GiImagem::find($id);
            $this->deletaImagemS3($imagem);

            if ($imagem->gi_galeria->img_capa == $imagem->caminho) {
                DB::rollBack();
                return false;
            }
            $imagem->delete();
            DB::commit();
            return $imagem->gi_galeria->id;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function deletaImagemS3($imagem) {
        try {
            Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem->caminho);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deletaGaleriaS3($galeria) {
        try {
            $imagens = $galeria->imagens;
            foreach ($imagens as $imagem) {
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem->caminho);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function paginateImagem($filtros = array(), $qtdPorPag) {

        $imagens = GiImagem::whereHas('gi_galeria', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_galeria']) && $filtros['filtro_galeria'] != '') {
                        $query->where('slug', '=', $filtros['filtro_galeria']);
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->with('gi_galeria')
                ->paginate($qtdPorPag);

        return $imagens;
    }

}
