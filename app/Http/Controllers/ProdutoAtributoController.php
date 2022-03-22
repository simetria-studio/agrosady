<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Prowork\Produtos\Repositories\ProdutoAtributoRepository;
use App\Http\Requests\ProdutoAtributoRequest;
use Illuminate\Http\Request;
use Notifications;

class ProdutoAtributoController extends Controller {

    protected $ProdutoAtributoRepository;

    public function __construct(ProdutoAtributoRepository $ProdutoAtributoRepository) {
        $this->ProdutoAtributoRepository = $ProdutoAtributoRepository;
    }

    public function updateAtributo(ProdutoAtributoRequest $request, $id) {
        $input = $request->all();
        mb_internal_encoding('UTF-8');
        $input['nome'] = ucfirst(mb_strtolower( $input['nome']));
        $input['valor'] = ucfirst(mb_strtolower( $input['valor']));
        $produto_id = $this->ProdutoAtributoRepository->getById($id)->produto->id;
        if ($this->ProdutoAtributoRepository->updateAtributo($input, $id)) {
            Notifications::add('Registro alterado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('produto.edit', $produto_id);
    }

    public function destroyAtributo($id) {
        $produto_id = $this->ProdutoAtributoRepository->getById($id)->produto->id;
        if ($this->ProdutoAtributoRepository->destroyAtributo($id)) {
            Notifications::add('Registro excluido com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ops... Operação não realizada! Não é possível excluir o registro', 'danger', 'operacao');
        }
        return redirect()->route('produto.edit', $produto_id);
    }

}
