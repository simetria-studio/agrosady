<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UndCategoriaRequest;
use App\Prowork\Und\Interfaces\UndCategoriaInterface;
use Illuminate\Http\Request;
use Notifications;

class UndCategoriaController extends Controller {

	protected $repository;

	public function __construct(UndCategoriaInterface $repository) {
		$this->repository = $repository;
	}

	public function index(Request $request) {
		$filter = $request->input();
		$categorias = $this->repository->paginate($filter, 10);
		return view('backend/und/categoria/page')->with('categorias', $categorias);
	}

	public function create() {
		return view('backend/und/categoria/create');
	}

	public function store(UndCategoriaRequest $request) {
		$input = $request->all();
		if ($this->repository->store($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('und.categoria.index');

	}

	public function edit($id) {
		$categoria = $this->repository->show($id);
		return view('backend/und/categoria/edit')->with('categoria', $categoria);
	}

	public function update(UndCategoriaRequest $request, $id) {
		$input = $request->all();
		if ($this->repository->update($input, $id)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('und.categoria.index');
	}

	public function destroy($id) {
		if ($this->repository->destroy($id)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('und.categoria.index');
	}
}
