<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Prowork\Motorista\Repositories\MotoristaRepository;
use Illuminate\Http\Request;
use Notifications;

class MotoristaController extends Controller {

	protected $repository;

	public function __construct(MotoristaRepository $repository) {
		$this->repository = $repository;
	}

	public function index(Request $request) {
		$filter = $request->input();
		$motoristas = $this->repository->paginate($filter, 10);
		return view('backend/motorista/page')->with('motoristas', $motoristas);
	}

	public function create() {
		return view('backend/motorista/create');
	}

	public function store(Request $request) {
		$input = $request->all();
		if ($this->repository->store($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('motorista.index');
	}

	public function edit($id) {
		$motorista = $this->repository->show($id);
		return view('backend/motorista/edit')->with('motorista', $motorista);
	}

	public function update(Request $request, $id) {
		$input = $request->all();
		if ($this->repository->update($input, $id)) {
			Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao Alterar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('motorista.index');
	}

	public function destroy($id) {

		if ($this->repository->destroy($id)) {
			Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('motorista.index');
	}

}
