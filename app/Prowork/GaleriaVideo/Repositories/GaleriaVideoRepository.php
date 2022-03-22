<?php

namespace App\Prowork\GaleriaVideo\Repositories;

use App\Prowork\Base\Repositories\ImageRepository;
use App\Prowork\GaleriaVideo\Models\GvGaleria;
use App\Prowork\GaleriaVideo\Models\GvVideo;
use Config;
use Illuminate\Support\Facades\Storage;
use DB;

class GaleriaVideoRepository {

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function index() {
        $galeria = GvGaleria::all();
        return $galeria;
    }

    public function showGaleria($id) {
        $galeria = GvGaleria::find($id);
        return $galeria;
    }

    public function getBySlug($slug) {
        $galeria = GvGaleria::findBySlug($slug);
        return $galeria;
    }

    public function storeGaleria($input, $thumbs = array()) {
        if (isset($input['img_capa'])) {
            $img_capa = $this->imageRepository->sendImage($input['img_capa'], 'galeria-video/imagens-capa/', Config::get('prowork.projeto'), $thumbs);
            $input['img_capa'] = $img_capa;
        }

        DB::beginTransaction();
        try {
            $galeria = GvGaleria::create($input);
            DB::commit();
            return $galeria;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateGaleria($input, $id, $thumbs = array()) {

        if (isset($input['img_capa'])) {
            $img_capa = $this->imageRepository->sendImage($input['img_capa'], 'galeria-video/imagens-capa/', Config::get('prowork.projeto'), $thumbs);
            $input['img_capa'] = $img_capa;
            $this->deletaImagemCapaS3(GvGaleria::find($id));
        }

        DB::beginTransaction();
        try {
            $galeria = GvGaleria::find($id);
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
            $galeria = GvGaleria::find($id);
            $this->deletaImagemCapaS3($galeria);
            $galeria->videos()->delete();
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
            $galeria = GvGaleria::where('titulo', 'like', '%' . $filtros['filtro_pesquisa'] . '%')->orderBy($orderBy[0], $orderBy[1])->paginate($qtdPorPag);
        } else {
            $galeria = GvGaleria::orderBy($orderBy[0], $orderBy[1])->paginate($qtdPorPag);
        }
        return $galeria;
    }

    public function dataForSelect() {
        $galeria = GvGaleria::lists('titulo', 'id')->all();
        return $galeria;
    }

    /** MÉTODOS VÍDEO * */
    public function storeVideo($input, $servidor, $id) {

        $caminho = $this->preparaLinkVideo($input['caminho'], $servidor['servidor']);

        DB::beginTransaction();
        try {
            $galeria = GvGaleria::find($id);

            $video = new GvVideo();
            $video->titulo = $input['titulo'];
            $video->caminho = $caminho;
            $galeria->videos()->save($video);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function preparaLinkVideo($link, $servidor) {

        if ($servidor == 'youtube') {
            $sufixo = substr(strrchr($link, "="), 1);
            $iframe = '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $sufixo . '?rel=0&showinfo=0' . '" frameborder="0" allowfullscreen"></iframe>';
        } elseif ($servidor == 'vimeo') {
            $sufixo = substr(strrchr($link, "/"), 1);
            $iframe = '<iframe src="https://player.vimeo.com/video/' . $sufixo . '?title=0&byline=0' . '" width="100%" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        }
        return $iframe;
    }

    public function destroyVideo($id) {
        DB::beginTransaction();
        try {
            $video = GvVideo::find($id);
            $video->delete();
            DB::commit();
            return $video->gv_galeria->id;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginateVideo($filtros = array(), $qtdPorPag) {

        $videos = GvVideo::whereHas('gv_galeria', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_galeria']) && $filtros['filtro_galeria'] != '') {
                        $query->where('slug', '=', $filtros['filtro_galeria']);
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->with('gv_galeria')
                ->paginate($qtdPorPag);

        return $videos;
    }

    public function deletaImagemCapaS3($galeria) {
        $thumbs = array(['width' => '510', 'height' => '260']); //tumb configurado no gv controler.
        if ($galeria->img_capa != '') {
            $img_capa = $galeria->img_capa;
            $nome_img = explode(".", $img_capa);
            try {
                foreach ($thumbs as $val) {
                    Storage::disk('s3')->delete(Config::get('prowork.projeto') . $nome_img[0] . '_' . $val['width'] . 'x' . $val['height'] . '.' . $nome_img[1]); //deletar todos os thumbs.
                }
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $img_capa); //deleta a imagem 
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

}
