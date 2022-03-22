<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Prowork\Produtos\Repositories\ProdutoCategoriaRepository;
use App\Prowork\Produtos\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use Notifications;

class ProdutoController extends Controller {

    protected $ProdutoRepository;
    protected $CategoriaRepository;

    public function __construct(ProdutoRepository $ProdutoRepository, ProdutoCategoriaRepository $CategoriaRepository) {
        $this->ProdutoRepository = $ProdutoRepository;
        $this->CategoriaRepository = $CategoriaRepository;
    }

    public function index(Request $request) {
        $filter = $request->input();
        if (isset($filter['filtro_categoria']) && $filter['filtro_categoria'] != '') {
            $categorias_filhas = $this->CategoriaRepository->categoriasFilha($filter['filtro_categoria']); //pego todas as categorias abaixo para listar os produtos.
            $produtos = $this->ProdutoRepository->paginateByCategorias($filter, $categorias_filhas, 15);
        }else{
            $produtos = $this->ProdutoRepository->paginate($filter, 15);
        }
        $categorias = $this->CategoriaRepository->index();
        $cat_select = array();
        foreach ($categorias as $categoria) {
            $x = $categoria->id;
            $y = $categoria->nome;

            if ($categoria->cat_pai_id == 0) {
                $cat_select[$x] = $y;
            } else {
                $cat_pai = $this->CategoriaRepository->show($categoria->cat_pai_id)->nome;
                $cat_select[$x] = $y . ' - ' . $cat_pai;
            }
        }
        return view('backend/produtos/produto/page', compact('produtos', 'cat_select'));
    }

    public function create() {
        $categorias = $this->CategoriaRepository->index();
        $cat_select = array();
        foreach ($categorias as $categoria) {
            $x = $categoria->id;
            $y = $categoria->nome;

            if ($categoria->cat_pai_id == 0) {
                $cat_select[$x] = $y;
            } else {
                $cat_pai = $this->CategoriaRepository->show($categoria->cat_pai_id)->nome;
                $cat_select[$x] = $y . ' - ' . $cat_pai;
            }
        }
        return view('backend/produtos/produto/create', compact('cat_select'));
    }

    public function store(ProdutoRequest $request) {
//        $thumbs_capa = array(['width' => '265', 'height' => '265']);
//        $thumbs_banner = array(['width' => '1920', 'height' => '540']);
        if ($request->get('atributo')) {
            $atributo = $request->only('atributo');
            $valor_atributo = $request->only('valor_atributo');
            mb_internal_encoding('UTF-8');
            $atributos_valores = array_combine(array_map('ucfirst', array_map('mb_strtolower', $atributo['atributo'])), array_map('ucfirst', array_map('mb_strtolower', $valor_atributo['valor_atributo'])));
        } else {
            $atributos_valores = array();
        }
//        dd($atributos_valores);
        $categorias = $request->only('categorias');
        $input = $request->except('categorias', 'atributo', 'valor_atributo');
//        dd($input);


        if ($this->ProdutoRepository->store($input, $categorias, $atributos_valores)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('produto.index');
    }

    public function edit($id) {
        $categorias = $this->CategoriaRepository->index();
        $cat_select = array();
        foreach ($categorias as $categoria) {
            $x = $categoria->id;
            $y = $categoria->nome;

            if ($categoria->cat_pai_id == 0) {
                $cat_select[$x] = $y;
            } else {
                $cat_pai = $this->CategoriaRepository->show($categoria->cat_pai_id)->nome;
                $cat_select[$x] = $y . ' - ' . $cat_pai;
            }
        }
        $produto = $this->ProdutoRepository->getById($id);
        $atributos = $produto->atributos;
//        dd($atributos);
        return view('backend/produtos/produto/edit', compact('produto', 'cat_select', 'atributos'));
    }

    public function update(ProdutoRequest $request, $id) {
//        $thumbs_capa = array(['width' => '265', 'height' => '265']);
//        $thumbs_banner = array(['width' => '1920', 'height' => '540']);
        if ($request->get('atributo')) {
            $atributo = $request->only('atributo');
            $valor_atributo = $request->only('valor_atributo');
            mb_internal_encoding('UTF-8');
            $atributos_valores = array_combine(array_map('ucfirst', array_map('mb_strtolower', $atributo['atributo'])), array_map('ucfirst', array_map('mb_strtolower', $valor_atributo['valor_atributo'])));
        } else {
            $atributos_valores = array();
        }
        $categorias = $request->only('categorias');
        $input = $request->except('categorias', 'atributo', 'valor_atributo');
        if ($this->ProdutoRepository->update($input, $categorias, $id, $atributos_valores)) {
            Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }

        return redirect()->route('produto.index');
    }

    public function destroy($id) {
        if ($this->ProdutoRepository->destroy($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('produto.index');
    }

}
