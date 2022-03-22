<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Prowork\RdDigital\Repositories\RdRepository;
use App\Http\Requests\RdDigitalRequest;
use Illuminate\Http\Request;
use Notifications;

class RdDigitalController extends Controller {

    protected $RdRepository;

    public function __construct(RdRepository $RdRepository) {
        $this->RdRepository = $RdRepository;
    }

    public function listArquivos(Request $request) {
        $filtro = $request->all();
        $arquivos = $this->RdRepository->paginateArquivos($filtro, 15);
        return view('backend/rd-digital/arquivo/page', compact('arquivos'));
    }

    public function createArquivo() {
        return view('backend/rd-digital/arquivo/create');
    }

    public function storeArquivo(RdDigitalRequest $request) {
        $input = $request->all();
        if ($this->RdRepository->storeArquivo($input)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('rd-digital.arquivo.index');
    }

    public function destroyArquivo($id) {
        if ($this->RdRepository->destroyArquivo($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('rd-digital.arquivo.index');
    }

}
