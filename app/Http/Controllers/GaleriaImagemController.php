<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiGaleriaRequest;
use App\Prowork\GaleriaImagem\Repositories\GaleriaImagemRepository;
use Illuminate\Http\Request;
use Notifications;

class GaleriaImagemController extends Controller {

    protected $repository;

    public function __construct(GaleriaImagemRepository $repository) {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $filter = $request->input();
        $galerias = $this->repository->paginateGaleria($filter, 8);
        return view('backend/galeria-imagem/galeria/page')->with('galerias', $galerias);
    }

    public function createGaleria() {
        return view('backend/galeria-imagem/galeria/create');
    }

    public function storeGaleria(GiGaleriaRequest $request) {
        $input = $request->all();
        $retorno = $this->repository->storeGaleria($input);
        if ($retorno == false) {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
            return redirect()->route('galeria-imagem.galeria.create');
        } else {
            return redirect()->route('galeria-imagem.imagem.create', ['id' => $retorno->id]);
        }
    }

    public function editGaleria($id) {
        $galeria = $this->repository->showGaleria($id);
        return view('backend/galeria-imagem/galeria/edit')->with('galeria', $galeria);
    }

    public function updateGaleria(GiGaleriaRequest $request, $id) {
        $input = $request->all();
        if ($this->repository->updateGaleria($input, $id)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('galeria-imagem.index');
    }

    public function destroyGaleria($id) {

        if ($this->repository->destroyGaleria($id)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('galeria-imagem.index');
    }

    /** MÉTODOS IMAGEM * */
    public function createImagem($id) {
        $galeria = $this->repository->showGaleria($id);
        return view('backend/galeria-imagem/imagem/create')->with('galeria', $galeria);
    }

    public function storeImagem(Request $request, $id) {
        $input = $request->all();
        if ($this->repository->storeImagem($input, $id)) {
            return response()->json(['success' => 200]);
        } else {
            return response()->json(['error' => 400]);
        }
    }

    public function editImagem($id) {
        $imagem = $this->repository->showImagem($id);
        return view('backend/galeria-imagem/imagem/edit')->with('imagem', $imagem);
    }

    public function destroyImagem($id) {
        
        $retorno = $this->repository->destroyImagem($id);
        if ($retorno == false) {
            Notifications::add('Ops... Operação não realizada! Não é possível excluir uma imagem de capa.', 'danger', 'operacao');
            return redirect()->route('galeria-imagem.index');
        } else {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
            return redirect()->route('galeria-imagem.imagem.create', ['id' => $retorno]);
        }
        
    }

    public function setImgCapaGaleria($id) {

        $retorno = $this->repository->setImgCapaGaleria($id);
        if ($retorno == false) {
            Notifications::add('Capa definida com sucesso!', 'success', 'operacao');
            return redirect()->route('galeria-imagem.index');
        } else {
            Notifications::add('Ocorreu um erro ao definir a imagem como capa.', 'danger', 'operacao');
            return redirect()->route('galeria-imagem.imagem.create', ['id' => $retorno]);
        }
        
    }

}
