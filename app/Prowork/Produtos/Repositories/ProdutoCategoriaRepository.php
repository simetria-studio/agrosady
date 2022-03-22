<?php

namespace App\Prowork\Produtos\Repositories;

use App\Prowork\Produtos\Models\ProdutoCategoria;
use DB;

class ProdutoCategoriaRepository {

    public function index() {
        $categorias = ProdutoCategoria::all();
        return $categorias;
    }

    public function show($id) {
        $categoria = ProdutoCategoria::find($id);
        return $categoria;
    }
    
    public function getBySlug($slug) {
        $categoria = ProdutoCategoria::findBySlug($slug);
        return $categoria;
    }

    public function categoriasPai($id) { //funcao para pegar as categorias pai para gerar os links do breadcrumbs
        $categoria = ProdutoCategoria::find($id);
        $categorias_pai = collect();

        while ($categoria->cat_pai_id != 0) {
            $categoria = ProdutoCategoria::find($categoria->cat_pai_id);
            $categorias_pai->prepend($categoria);
        }
        return $categorias_pai;
    }

    public function categoriasFilha($id) {  //pega os ids das categorias filha para listar os produtos
        $caminho = ProdutoCategoria::find($id)->caminho;
        $categorias = ProdutoCategoria::where('caminho', 'like', "%" . $caminho . "%")->lists('id');
        return $categorias;
    }

    public function showCategoriasPorIds($ids) {
        $categorias = ProdutoCategoria::whereIn('id', $ids)->get(); //todos as pastas por id recebido).
        return $categorias;
    }

    public function store($input) {
        
        try {
            $categoria = ProdutoCategoria::create($input);
            if ($input['cat_pai_id'] == 0) {
                $input['caminho'] = $categoria->slug . '/';
            } else {
                $caminho_pasta_pai = ProdutoCategoria::find($input['cat_pai_id'])->caminho;
                $input['caminho'] = $caminho_pasta_pai . $categoria->slug . '/';
            }
            $categoria->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update($input, $id) {
        $categorias_filha_ids = $this->categoriasFilha($id);
        $categorias_filha = $this->showCategoriasPorIds($categorias_filha_ids);
        try {
            $categoria = ProdutoCategoria::find($id);
            $caminho_antigo = $categoria->caminho;
            if ($input['cat_pai_id'] == 0) {
                $input['caminho'] = $categoria->slug . '/';
            } else {
                $caminho_pasta_pai = ProdutoCategoria::find($input['cat_pai_id'])->caminho;
                $input['caminho'] = $caminho_pasta_pai . $categoria->slug . '/';
            }
            $categoria->update($input);
            //atualiza o caminho das pastas filhas
            $caminho_novo = $input['caminho'];
            foreach($categorias_filha as $cat_filha){
                $caminho['caminho'] = str_replace($caminho_antigo, $caminho_novo, $cat_filha->caminho);
                $cat_filha->update($caminho);
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroy($id) {
        $categorias_filha = $this->categoriasFilha($id);
        DB::beginTransaction();
        try {
            foreach($categorias_filha as $cat_filha){
                $cat = ProdutoCategoria::find($cat_filha);
                $cat->produtos()->detach();
                $cat->delete();
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginate($filtros = array(), $qtdPorPag) {
        if (isset($filtros['filtro_pesquisa'])) {
            $categorias = ProdutoCategoria::where('nome', 'like', '%' . $filtros['filtro_pesquisa'] . '%')->paginate($qtdPorPag);
        } else {
            $categorias = ProdutoCategoria::paginate($qtdPorPag);
        }

        return $categorias;
    }

    public function dataForSelect() {
        $categorias = ProdutoCategoria::lists('nome', 'id')->all();
        return $categorias;
    }

    public function categorias() {
        $categorias = ProdutoCategoria::with('categoria_filha')->where('cat_pai_id', 0)->orderBy('nome', 'asc')->get();
        return $categorias;
    }

    public function subcategorias($id) {
        $categorias_filhas = ProdutoCategoria::where('cat_pai_id', $id)->orderBy('nome', 'asc')->get();
        return $categorias_filhas;
    }

}
