<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoCategoriaRequest;
use App\Prowork\Produtos\Repositories\ProdutoCategoriaRepository;
use Illuminate\Http\Request;
use Notifications;

class ProdutoCategoriaController extends Controller {

    protected $repository;

    public function __construct(ProdutoCategoriaRepository $repository) {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $filter = $request->input();
        $categorias = $this->repository->paginate($filter, 30);
        return view('backend/produtos/categoria/page')->with('categorias', $categorias);
    }

    public function create() {
        $categorias = $this->repository->index();
        $cat_select[0] = 'Root';
        foreach ($categorias as $categoria) {
            $x = $categoria->id;
            $y = $categoria->nome;
            
            if ($categoria->cat_pai_id == 0) {
                $cat_select[$x] = $y;
            } else {
                $cat_pai = $this->repository->show($categoria->cat_pai_id)->nome;
                $cat_select[$x] = $y . ' - ' . $cat_pai;
            }
        }
        return view('backend/produtos/categoria/create', compact('cat_select'));
    }

    public function store(ProdutoCategoriaRequest $request) {
        $input = $request->all();
        if ($this->repository->store($input)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('produto.categoria.index');
    }

    public function edit($id) {
        $categorias = $this->repository->index();
        $cat_select[0] = 'Root';
        foreach ($categorias as $categoria) {
            $x = $categoria->id;
            $y = $categoria->nome;
            
            if ($categoria->cat_pai_id == 0) {
                $cat_select[$x] = $y;
            } else {
                $cat_pai = $this->repository->show($categoria->cat_pai_id)->nome;
                $cat_select[$x] = $y . ' - ' . $cat_pai;
            }
        }
        $categoria = $this->repository->show($id);
        return view('backend/produtos/categoria/edit', compact('categoria', 'cat_select'));
    }

    public function update(ProdutoCategoriaRequest $request, $id) {
        $input = $request->all();
        if ($this->repository->update($input, $id)) {
            Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('produto.categoria.index');
    }

    public function destroy($id) {
        if ($this->repository->destroy($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('produto.categoria.index');
    }

}
