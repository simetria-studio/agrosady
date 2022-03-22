<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BvPastaRequest;
use App\Http\Requests\BvArquivoRequest;
use App\Prowork\BibliotecaVirtual\Repositories\BvRepository;
use Illuminate\Http\Request;
use Notifications;

class BvController extends Controller {

    protected $bvRepository;

    public function __construct(BvRepository $bvRepository) {
        $this->bvRepository = $bvRepository;
    }

    public function index(Request $request) {
        $filtro = $request->all();
        $pastas = $this->bvRepository->paginatePastas($filtro, 18);
        return view('backend/bv/pasta/page')->with(['pastas' => $pastas]);
    }

    public function createPasta() {
        return view('backend/bv/pasta/create');
    }

    public function storePasta(BvPastaRequest $request) {
        $input = $request->all();
        if ($this->bvRepository->storePasta($input)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('bv.index');
    }

    public function editPasta($id) {
        $pasta = $this->bvRepository->showPasta($id);
        return view('backend/bv/pasta/edit')->with('pasta', $pasta);
    }

    public function updatePasta(BvPastaRequest $request, $id) {
        $input = $request->all();
        if ($this->bvRepository->updatePasta($input, $id)) {
            Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('bv.index');
    }

    public function destroyPasta($id) {
        if ($this->bvRepository->destroyPasta($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('bv.index');
    }

    public function listArquivos(Request $request, $id) {
        $filtro = $request->all();
        if (!$filtro) {
            $filtro = array('filtro_pesquisa' => '');
        }
        $pasta = $this->bvRepository->showPasta($id);
        $arquivos = $this->bvRepository->paginateArquivos($filtro, 18, $id);
        return view('backend/bv/arquivo/page')->with(['arquivos' => $arquivos, 'id_pasta' => $id, 'pasta' => $pasta]);
    }

    public function createArquivo($id) {
        $pasta = $this->bvRepository->showPasta($id);
        return view('backend/bv/arquivo/create')->with(['pasta' => $pasta]);
    }

    public function storeArquivo(BvArquivoRequest $request, $id) {
        $input = $request->all();
        if ($this->bvRepository->storeArquivo($input, $id)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('bv.arquivo.index', $id);
    }

    public function destroyArquivo($id_pasta, $id_arquivo) {
        if ($this->bvRepository->destroyArquivo($id_arquivo)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('bv.arquivo.index', $id_pasta);
    }

}
