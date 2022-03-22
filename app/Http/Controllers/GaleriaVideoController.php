<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GvGaleriaRequest;
use App\Http\Requests\GvVideoRequest;
use App\Prowork\GaleriaVideo\Repositories\GaleriaVideoRepository;
use Illuminate\Http\Request;
use Notifications;

class GaleriaVideoController extends Controller {

    protected $repository;

    public function __construct(GaleriaVideoRepository $repository) {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $filter = $request->input();
        $galerias = $this->repository->paginateGaleria($filter, 10);
        return view('backend/galeria-video/galeria/page')->with('galerias', $galerias);
    }

    public function createGaleria() {
        return view('backend/galeria-video/galeria/create');
    }

    public function storeGaleria(GvGaleriaRequest $request) {
        $thumbs = array(['width' => '510', 'height' => '260']);
        $input = $request->all();
        $retorno = $this->repository->storeGaleria($input, $thumbs);
        if (!$retorno) {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
            return redirect()->route('galeria-video.galeria.create');
        } else {
            return redirect()->route('galeria-video.video.create', ['id' => $retorno->id]);
        }
    }

    public function editGaleria($id) {
        $galeria = $this->repository->showGaleria($id);
        return view('backend/galeria-video/galeria/edit')->with('galeria', $galeria);
    }

    public function updateGaleria(GvGaleriaRequest $request, $id) {
        $thumbs = array(['width' => '510', 'height' => '260']);
        $input = $request->all();
        if ($this->repository->updateGaleria($input, $id, $thumbs)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('galeria-video.index');
    }

    public function destroyGaleria($id) {

        if ($this->repository->destroyGaleria($id)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('galeria-video.index');
    }

    /** MÉTODOS VÍDEO **/
    
    public function createVideo($id) {
        $galeria = $this->repository->showGaleria($id);
        return view('backend/galeria-video/video/create')->with('galeria', $galeria);
    }

    public function storeVideo(GvVideoRequest $request, $id) {

        $input = $request->except('servidor');
        $servidor = $request->only('servidor');
        if ($this->repository->storeVideo($input, $servidor, $id)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        } 
        return redirect()->route('galeria-video.video.create', [$id]);
    }
    
    public function destroyVideo($id) {
        
        $retorno = $this->repository->destroyVideo($id);
        if ($retorno == false) {
            Notifications::add('Ops... Operação não realizada! Não é possível excluir uma imagem de capa.', 'danger', 'operacao');
            return redirect()->route('galeria-video.index');
        } else {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
            return redirect()->route('galeria-video.video.create', ['id' => $retorno]);
        }
        
    }
    
    
    
    
    
    
    

}
