<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriaEventoRequest;
use App\Prowork\GaleriaEvento\Repositories\GaleriaEventoRepository;
use Illuminate\Http\Request;
use Notifications;

class GaleriaEventoController extends Controller {

    protected $repository;

    public function __construct(GaleriaEventoRepository $repository) {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $filter = $request->input();
        $eventos = $this->repository->paginateEvento($filter, 10);
        return view('backend/galeria-evento/page')->with('eventos', $eventos);
    }

    public function createEvento() {
        return view('backend/galeria-evento/create');
    }

    public function storeEvento(GaleriaEventoRequest $request) {
        $thumbs = array(['width' => '730', 'height' => '300']);
        $input = $request->all();
//        dd($input);
        $retorno = $this->repository->storeEvento($input, $thumbs);
        if ($retorno == false) {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
            return redirect()->route('galeria-evento.create');
        } else {
            return redirect()->route('galeria-evento.index', ['id' => $retorno->id]);
        }
    }

    public function editEvento($id) {
        $evento = $this->repository->showEvento($id);
        return view('backend/galeria-evento/edit')->with('evento', $evento);
    }

    public function updateEvento(GaleriaEventoRequest $request, $id) {
        $thumbs = array(['width' => '730', 'height' => '300']);
        $input = $request->all();
        if ($this->repository->updateEvento($input, $id, $thumbs)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('galeria-evento.index');
    }

    public function destroyEvento($id) {

        if ($this->repository->destroyEvento($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('galeria-evento.index');
    }

    

}
