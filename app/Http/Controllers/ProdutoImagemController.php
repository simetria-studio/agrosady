<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Prowork\Produtos\Repositories\ProdutoRepository;
use App\Prowork\Produtos\Repositories\ProdutoImagemRepository;
use Illuminate\Http\Request;
use Notifications;

class ProdutoImagemController extends Controller {

    protected $ProdutoRepository;
    protected $ProdutoImagemRepository;

    public function __construct(ProdutoRepository $ProdutoRepository, ProdutoImagemRepository $ProdutoImagemRepository) {
        $this->ProdutoRepository = $ProdutoRepository;
        $this->ProdutoImagemRepository = $ProdutoImagemRepository;
    }

    /** MÉTODOS IMAGEM * */
    public function createImagem($id) {
        $produto = $this->ProdutoRepository->getById($id);
        return view('backend/produtos/imagem/create', compact('produto'));
    }

    public function storeImagem(Request $request, $id) {
        $input = $request->all();
        if ($this->ProdutoImagemRepository->storeImagem($input, $id)) {
            return response()->json(['success' => 200]);
        } else {
            return response()->json(['error' => 400]);
        }
    }

    public function destroyImagem($id) {
        
        $retorno = $this->ProdutoImagemRepository->destroyImagem($id);
        if ($retorno == false) {
            Notifications::add('Ops... Operação não realizada! Não é possível excluir uma imagem de capa.', 'danger', 'operacao');
        } else {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        }
        return redirect()->route('produto.imagem.create', ['id' => $retorno] );
    }

    public function setImgCapaGaleria($id) {

        $retorno = $this->ProdutoImagemRepository->setImgCapaGaleria($id);
        if ($retorno == false) {
            Notifications::add('Capa definida com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao definir a imagem como capa.', 'danger', 'operacao');
        }
        return redirect()->route('produto.imagem.create', ['id' => $retorno]);
        
    }

}
