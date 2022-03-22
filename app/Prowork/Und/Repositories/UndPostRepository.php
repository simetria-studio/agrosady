<?php

namespace App\Prowork\Und\Repositories;

use App\Prowork\Base\Repositories\ImageRepository;
use App\Prowork\Und\Interfaces\UndPostInterface;
use App\Prowork\Und\Models\UndPost;
use Config;
use Illuminate\Support\Facades\Storage;
use DB;

class UndPostRepository implements UndPostInterface {

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function index() {
        $posts = UndPost::all();
        return $posts;
    }

    public function show($id) {
        $post = UndPost::with('categorias')->find([$id]);
        return $post;
    }

    public function store($input, $categorias, $thumbs = array()) {
        if (isset($input['imagem_destaque'])) {
            $imagem_destaque = $this->imageRepository->sendImage($input['imagem_destaque'], 'und-post/posts/imagens/', Config::get('prowork.projeto'), $thumbs);
            $input['imagem_destaque'] = $imagem_destaque;
        }

        $input['data_publicacao'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_publicacao'])));
        DB::beginTransaction();
        try {
            $post = UndPost::create($input);
            $post->categorias()->attach($categorias['categorias']);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update($input, $categorias, $id, $thumbs = array()) {

        /* imagem */
        if (isset($input['imagem_destaque'])) {
            $imagem_destaque = $this->imageRepository->sendImage($input['imagem_destaque'], 'und-post/posts/imagens/', Config::get('prowork.projeto'), $thumbs);
            $input['imagem_destaque'] = $imagem_destaque;
            $this->deleteImagemPostS3(UndPost::find($id));
        }

        $input['data_publicacao'] = date('Y-m-d', strtotime(str_replace('/', '-', $input['data_publicacao'])));
        DB::beginTransaction();
        try {
            $post = UndPost::find($id);
            $post->update($input);
            $post->categorias()->sync($categorias['categorias']);
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
            $post = UndPost::find($id);
            $this->deleteImagemPostS3($post);
            $post->categorias()->detach();
            foreach ($post->perguntas as $p) {
                $p->respostas()->delete();
                $p->opcoes()->delete();
            }
            $post->perguntas()->delete();
            $post->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function deleteImagemPostS3($post) {
        $thumbs = array(['width' => '1345', 'height' => '550']); //tumb configurado no blog post controler.
        if ($post->imagem_destaque != '') {
            $imagem_destaque = $post->imagem_destaque;
            $nome_img = explode(".", $imagem_destaque);
            try {
                foreach ($thumbs as $val) {
                    Storage::disk('s3')->delete(Config::get('prowork.projeto') . $nome_img[0] . '_' . $val['width'] . 'x' . $val['height'] . '.' . $nome_img[1]); //deletar todos os thumbs.
                }
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem_destaque); //deleta a imagem 
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    public function getBySlug($slug) {
        $post = UndPost::findBySlug($slug);
        return $post;
    }

    public function paginate($filtros = array(), $qtdPorPag) {

        $posts = UndPost::where(function ($query) use (&$filtros, &$orderBy) {
                    if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
                        $query->where('titulo', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                        $query->orWhere('autor', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                    }
                })
                ->whereHas('categorias', function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_categoria']) && $filtros['filtro_categoria'] != '') {
                        $query->where('und_categoria_id', '=', $filtros['filtro_categoria']);
                    }
                })
                ->orderBy('data_publicacao', 'desc')
                ->orderBy('id', 'desc')
                ->with('categorias')
                ->paginate($qtdPorPag);

        return $posts;
    }

    //        funcao para retornar apenas os posts com data de publicação ativo no frontend
    public function paginateFrontend($categoria_id, $qtdPorPag) {

        $posts = UndPost::where('data_publicacao', '<=', date("Y-m-d H:i:s"))
                ->whereHas('categorias', function ($query) use (&$categoria_id) {
                    if (isset($categoria_id) && $categoria_id != '') {
                        $query->where('und_categoria_id', '=', $categoria_id);
                    }
                })
                ->orderBy('data_publicacao', 'desc')
                ->orderBy('id', 'desc')
                ->with('categorias')
                ->paginate($qtdPorPag);

        return $posts;
    }

}
