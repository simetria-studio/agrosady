<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RastMovimentacaoRequest;
use App\Http\Requests\RastObjetoRequest;
use App\Prowork\Rastreio\Repositories\RastreioRepository;
use Illuminate\Http\Request;
use Notifications;

class RastreioController extends Controller {

	protected $repository;

	public function __construct(RastreioRepository $repository) {
		$this->repository = $repository;
	}

	public function index(Request $request) {

		$filter = $request->input();
		$objetos = $this->repository->paginateObjeto($filter, 10);
		return view('backend/rastreio/objeto/page')->with('objetos', $objetos);
	}

	public function createObjeto() {

		$usuarios = $this->repository->dataForSelect();
		return view('backend/rastreio/objeto/create')->with('usuarios', $usuarios);
	}

	public function storeObjeto(RastObjetoRequest $request) {
		$input = $request->all();
		if ($this->repository->storeObjeto($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('rastreio.index');
	}

	public function destroyObjeto($id) {

		if ($this->repository->destroyObjeto($id)) {
			Notifications::add('Registro Alterado com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('rastreio.index');
	}

	/** MÉTODOS MOVIMENTAÇÃO **/

	public function listMovimentacao($id) {
		$objeto = $this->repository->showObjeto($id);
		return view('backend/rastreio/movimentacao/page')->with('objeto', $objeto);
	}

	public function createMovimentacao($id) {
		$objeto = $this->repository->showObjeto($id);
		return view('backend/rastreio/movimentacao/create')->with('objeto', $objeto);
	}

	public function storeMovimentacao(RastMovimentacaoRequest $request, $id) {
		$input = $request->all();
		$input['id'] = $id;
		if ($this->repository->storeMovimentacao($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('rastreio.movimentacao.listMov', ['id' => $input['id']]);
	}

}
