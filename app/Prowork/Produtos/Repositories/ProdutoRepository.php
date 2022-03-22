<?php

namespace App\Prowork\Produtos\Repositories;

use App\Prowork\Base\Repositories\ImageRepository;
use App\Prowork\Base\Repositories\FileRepository;
use App\Prowork\Produtos\Models\Produto;
use App\Prowork\Produtos\Models\ProdutoAtributo;
use Config;
use Illuminate\Support\Facades\Storage;
use DB;

class ProdutoRepository {

    protected $imageRepository;
    protected $fileRepository;

    public function __construct(ImageRepository $imageRepository, FileRepository $fileRepository) {
        $this->imageRepository = $imageRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index() {
        $produtos = Produto::all();
        return $produtos;
    }

    public function show($id) {
        $produto = Produto::with('categorias')->find([$id]);
        return $produto;
    }

    public function getBySlug($slug) {
        $produto = Produto::findBySlug($slug);
        return $produto;
    }

    public function getById($id) {
        $produto = Produto::find($id);
        return $produto;
    }

    public function store($input, $categorias, $atributos_valores) {

        if (isset($input['imagem_banner'])) {
            $imagem_banner = $this->imageRepository->sendImage($input['imagem_banner'], 'produtos/imagens/', Config::get('prowork.projeto'));
            $input['imagem_banner'] = $imagem_banner;
        }
        if (isset($input['data_promocao']) && $input['data_promocao'] != '') {
            $input['data_promocao'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_promocao'])));
        } else {
            $input['data_promocao'] = null;
        }
        if (isset($input['preco_promocional']) && $input['preco_promocional'] == '') {
            $input['preco_promocional'] = null;
        }
        if (isset($input['preco']) && $input['preco'] == '') {
            $input['preco'] = null;
        }
        DB::beginTransaction();
        try {
            $produto = Produto::create($input);
            $produto->categorias()->attach($categorias['categorias']);

            $atributos = array();
            foreach ($atributos_valores as $key => $val) {
                $atrib = new ProdutoAtributo(['nome' => $key, 'valor' => $val]);
                $atributos[] = $atrib;
            }

            $produto->atributos()->saveMany($atributos);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update($input, $categorias, $id, $atributos_valores) {

        if (isset($input['imagem_banner'])) {
            $imagem_banner = $this->imageRepository->sendImage($input['imagem_banner'], 'produtos/imagens/', Config::get('prowork.projeto'));
            $input['imagem_banner'] = $imagem_banner;
            $this->deleteImagemBannerProdutoS3(Produto::find($id));
        }
        if (isset($input['data_promocao']) && $input['data_promocao'] != '') {
            $input['data_promocao'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_promocao'])));
        } else {
            $input['data_promocao'] = null;
        }
        if (isset($input['preco_promocional']) && $input['preco_promocional'] == '') {
            $input['preco_promocional'] = null;
        }
        if (isset($input['preco']) && $input['preco'] == '') {
            $input['preco'] = null;
        }
        DB::beginTransaction();
        try {
            $produto = Produto::find($id);
            $produto->update($input);
            $produto->categorias()->sync($categorias['categorias']);

            $atributos = array();
            foreach ($atributos_valores as $key => $val) {
                $atrib = new ProdutoAtributo(['nome' => $key, 'valor' => $val]);
                $atributos[] = $atrib;
            }
            $produto->atributos()->saveMany($atributos);
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
            $produto = Produto::find($id);
            $this->deletaProdutoImagensS3($produto);
            $this->deleteImagemBannerProdutoS3($produto);
            $produto->imagens()->delete();
            $produto->categorias()->detach();
            $produto->atributos()->delete();
            $produto->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function deleteImagemBannerProdutoS3($produto) {
        if ($produto->imagem_banner != '') {
            $imagem_banner = $produto->imagem_banner;
            try {
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem_banner); //deleta a imagem
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    public function deletaProdutoImagensS3($produto) {
        try {
            $imagens = $produto->imagens;
            foreach ($imagens as $imagem) {
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem->caminho);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function paginate($filtros = array(), $qtdPorPag) {

        $produtos = Produto::where(function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
                        $query->where('nome', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                    }
                })
                ->whereHas('categorias', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_categoria']) && $filtros['filtro_categoria'] != '') {
                        $query->where('produto_categoria_id', '=', $filtros['filtro_categoria']);
                    }
                })
//                ->whereHas('atributos', function ($query) use ($filtros) {
//                    if (isset($filtros['filtro_atributo']) && $filtros['filtro_atributo'] != '') {
//                    $query->where('valor', '=', $filtros['filtro_atributo']);
//                    }
//                })
                ->orderBy('nome', 'asc')
                ->orderBy('id', 'desc')
                ->with('categorias')
                ->paginate($qtdPorPag);
        return $produtos;
    }

    public function paginateByCategorias($filtros = array(), $ids = array(), $qtdPorPag) {
        $produtos = Produto::where(function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
                        $query->where('nome', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                    }
                })
                ->whereHas('categorias', function ($query) use (&$ids) {
                    $query->whereIn('produto_categoria_id', $ids);
                })
//                ->whereHas('atributos', function ($query) use ($filtros) {
//                    if (isset($filtros['filtro_atributo']) && $filtros['filtro_atributo'] != '') {
//                    $query->where('valor', '=', $filtros['filtro_atributo']);
//                    }
//                })
                ->orderBy('nome', 'asc')
                ->orderBy('id', 'desc')
                ->paginate($qtdPorPag);
        return $produtos;
    }

}
