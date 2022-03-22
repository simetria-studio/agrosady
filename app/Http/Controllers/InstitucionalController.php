<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstitucionalCriarPaginaRequest;
use App\Prowork\Institucional\Repositories\InstitucionalRepository;
use Notifications;
use Illuminate\Http\Request;

class InstitucionalController extends Controller {

    protected $repository;

    public function __construct(InstitucionalRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $paginas = $this->repository->showPaginas();
        return view('backend/institucional/page', compact('paginas'));
    }

    public function create() {
        return view('backend/institucional/create');
    }

    public function store(InstitucionalCriarPaginaRequest $request) {
        $input = $request->all();
        if ($this->repository->storePagina($input)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('institucional.index');
    }

    public function edit($id) {
        $pagina = $this->repository->showPagina($id);
        return view('backend/institucional/edit', compact('pagina'));
    }

    public function update(Request $request, $id) {
        $input = $request->all();
        if ($this->repository->updatePagina($input, $id)) {
            Notifications::add('Registro Alterado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('institucional.index');
    }

    public function destroy($id) {
        if ($this->repository->destroyPagina($id)) {
            Notifications::add('Registro deletado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('institucional.index');
    }

}
