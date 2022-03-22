<?php

namespace App\Prowork\Produtos\Repositories;

use App\Prowork\Base\Repositories\ImageRepository;
use App\Prowork\Produtos\Models\Produto;
use App\Prowork\Produtos\Models\ProdutoImagem;
use Config;
use Illuminate\Support\Facades\Storage;
use DB;

class ProdutoImagemRepository {

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function storeImagem($input, $id, $thumbs = array()) {
        $produto = Produto::find($id);
        $caminho = $this->imageRepository->sendImage($input['file'], 'produtos/imagens/' . $produto->slug . '/', Config::get('prowork.projeto'), $thumbs);

        DB::beginTransaction();
        try {

            if (empty($produto->imagem_destaque)) {
                $produto->imagem_destaque = $caminho;
                $produto->save();
            }

            $imagem = new ProdutoImagem();
            $imagem->caminho = $caminho;
            $produto->imagens()->save($imagem);

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

            $imagem = ProdutoImagem::find($id_imagem);
            $imagem->produto->imagem_destaque = $imagem->caminho;
            $imagem->produto->save();

            DB::commit();
            return $imagem->produto->id;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyImagem($id) {
        DB::beginTransaction();
        try {
            $imagem = ProdutoImagem::find($id);

            if ($imagem->produto->imagem_destaque == $imagem->caminho) {
                DB::rollBack();
                return false;
            }
            $this->deletaImagemS3($imagem);
            $imagem->delete();
            DB::commit();
            return $imagem->produto->id;
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

    public function paginateImagem($filtros = array(), $qtdPorPag) {

        $imagens = ProdutoImagem::whereHas('produto', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_galeria']) && $filtros['filtro_galeria'] != '') {
                        $query->where('slug', '=', $filtros['filtro_galeria']);
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->with('produto')
                ->paginate($qtdPorPag);

        return $imagens;
    }

}
