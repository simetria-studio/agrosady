<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeoCriarPaginaRequest;
use App\Http\Requests\SeoUpdatePaginaRequest;
use App\Prowork\Seo\Repositories\SeoRepository;
use Notifications;

class SeoController extends Controller {

    protected $repository;

    public function __construct(SeoRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $paginas = $this->repository->showPaginas();
        return view('backend/seo/page', compact('paginas'));
    }

    public function create() {
        return view('backend/seo/create');
    }

    public function store(SeoCriarPaginaRequest $request) {
        $input = $request->all();
        if ($this->repository->storePagina($input)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('seo.index');
    }

    public function edit($id) {
        $pagina = $this->repository->showPagina($id);
        return view('backend/seo/edit', compact('pagina'));
    }

    public function update(SeoUpdatePaginaRequest $request, $id) {
        $input = $request->all();
        if ($this->repository->updatePagina($input, $id)) {
            Notifications::add('Registro Alterado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('seo.index');
    }

    public function destroy($id) {
        if ($this->repository->destroyPagina($id)) {
            Notifications::add('Registro deletado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('seo.index');
    }

}
