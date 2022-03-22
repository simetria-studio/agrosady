<?php

namespace App\Prowork\Banner\Repositories;

use App\Prowork\Banner\Models\Banner;
use App\Prowork\Banner\Models\BannerImagem;
use App\Prowork\Base\Repositories\ImageRepository;
use Config;
use DB;
use Illuminate\Support\Facades\Storage;

class BannerRepository {

    protected $bannerRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function index() {
        $banner = Banner::all();
        return $banner;
    }

    public function show($id) {
        $banner = Banner::find($id);
        return $banner;
    }

    public function store($input) {

        DB::beginTransaction();
        try {
            $banner = Banner::create($input);
            DB::commit();
            return $banner;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update($input, $id) {

        DB::beginTransaction();
        try {
            $banner = Banner::find($id);
            $banner->update($input);
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
            $banner = Banner::find($id);
            $this->deletaGaleriaS3($banner);
            $banner->imagens()->delete();
            $banner->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginate($filtros = array(), $qtdPorPag, $orderBy = array()) {
        if (isset($filtros['filtro_pesquisa'])) {
            $banner = Banner::where('nome', 'like', '%' . $filtros['filtro_pesquisa'] . '%')->paginate($qtdPorPag);
        } else {
            $banner = Banner::paginate($qtdPorPag);
        }

        return $banner;
    }

    public function dataForSelectGaleria() {
        $galeria = GiGaleria::lists('titulo', 'id')->all();
        return $galeria;
    }

    /** MÉTODOS IMAGEM * */
    public function storeImagem($input, $thumbs = array()) {
        $input['data_inicio'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_inicio'])));
        if ($input['data_fim'] != '') {
            $input['data_fim'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_fim'])));
        }
//        dd($input);
        $input['caminho'] = $this->imageRepository->sendImage($input['caminho'], 'banner/imagens/', Config::get('prowork.projeto'), $thumbs);
        DB::beginTransaction();
        try {
            BannerImagem::create($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyImagem($id) {
        DB::beginTransaction();
        try {
            $imagem = BannerImagem::find($id);
            $this->deletaImagemS3($imagem);
            $imagem->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginateImagem($filtros = array(), $qtdPorPag) {

        $imagens = BannerImagem::whereHas('banner', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_banner']) && $filtros['filtro_banner'] != '') {
                        $query->where('id', '=', $filtros['filtro_banner']);
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->with('banner')
                ->paginate($qtdPorPag);

        return $imagens;
    }

    public function paginateImagemFrontend($filtros = array(), $qtdPorPag) {

        $imagens = BannerImagem::whereHas('banner', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_banner']) && $filtros['filtro_banner'] != '') {
                        $query->where('id', '=', $filtros['filtro_banner']);
                    }
                })
                ->where(function ($query) {
                    $query->where('data_inicio', '<=', date("Y-m-d"));
                    $query->where('data_fim', '>=', date("Y-m-d"));
                    $query->orWhere('data_fim', '=', "0000-00-00");
                })
                ->orderBy('data_inicio', 'desc')
                ->orderBy('id', 'desc')
                ->with('banner')
                ->paginate($qtdPorPag);
                
        return $imagens;
    }

    public function deletaImagemS3($imagem) {
        try {
            Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem->caminho);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deletaGaleriaS3($banner) {
        try {
            $imagens = $banner->imagens;
            foreach ($imagens as $imagem) {
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem->caminho);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
