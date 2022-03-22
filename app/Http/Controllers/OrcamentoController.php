<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColetaRequest;
use App\Http\Requests\OrcamentoRequest;
use App\Prowork\Orcamento\Repositories\OrcamentoRepository;
use Illuminate\Http\Request;
use Notifications;
use Auth;
use App\User;

class OrcamentoController extends Controller {

	protected $repository;

	public function __construct(OrcamentoRepository $repository) {
		$this->repository = $repository;
	}

	public function index(Request $request) {
		$filter = $request->input();
		$orcamentos = $this->repository->paginateOrcamento($filter, 10);
		return view('backend/orcamento/orcamento/page')->with('orcamentos', $orcamentos);
	}

	public function createOrcamento() {
		return view('backend/orcamento/orcamento/create');
	}

	public function storeOrcamento(OrcamentoRequest $request) {
		$input = $request->all();
		if ($this->repository->storeOrcamento($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.index');
	}

	public function editOrcamento($id) {
		$orcamento = $this->repository->showOrcamento($id);
		return view('backend/orcamento/orcamento/edit')->with('orcamento', $orcamento);
	}
	
        public function getUserByOcamento($id) {
                $user = User::find($id);
		return view('backend/orcamento/orcamento/show-user')->with('usuario', $user);
	}

	public function updateOrcamento(OrcamentoRequest $request, $id) {
		$input = $request->all();
		if ($this->repository->updateOrcamento($input, $id)) {
			Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao Alterar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.index');
	}

	public function editStatusOrcamento($id, $status) {

		if ($this->repository->editStatusOrcamento($id, $status)) {
			Notifications::add('Status atualizado com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao Alterar o status.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.index');
	}

	public function destroyOrcamento($id) {

		if ($this->repository->destroyOrcamento($id)) {
			Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.index');
	}

	/** MÉTODOS COLETA * */
	public function listColeta(Request $request) {
		$filter = $request->input();
		$coletas = $this->repository->paginateColeta($filter, 10);
		return view('backend/orcamento/coleta/page')->with('coletas', $coletas);
	}

	public function createColeta() {
		return view('backend/orcamento/coleta/create');
	}

	public function storeColeta(ColetaRequest $request) {
		$input = $request->all();
		if ($this->repository->storeColeta($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.coleta.index');
	}

	public function editColeta($id) {
		$coleta = $this->repository->showColeta($id);
		return view('backend/orcamento/coleta/edit')->with('coleta', $coleta);
	}
        
        public function getUserByColeta($id) {
                $user = User::find($id);
		return view('backend/orcamento/coleta/show-user')->with('usuario', $user);
	}

	public function updateColeta(ColetaRequest $request, $id) {
		$input = $request->all();
		if ($this->repository->updateColeta($input, $id)) {
			Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.coleta.index');
	}

	public function editStatusColeta($id, $status) {

		if ($this->repository->editStatusColeta($id, $status)) {
			Notifications::add('Status atualizado com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao Alterar o status.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.coleta.index');
	}

	public function destroyColeta($id) {

		if ($this->repository->destroyColeta($id)) {
			Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('operacao.coleta.index');
	}

}
