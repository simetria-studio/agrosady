<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoriaRequest;
use App\Prowork\Blog\Interfaces\BlogCategoriaInterface;
use Illuminate\Http\Request;
use Notifications;

class BlogCategoriaController extends Controller {

	protected $repository;

	public function __construct(BlogCategoriaInterface $repository) {
		$this->repository = $repository;
	}

	public function index(Request $request) {
		$filter = $request->input();
		$categorias = $this->repository->paginate($filter, 10);
		return view('backend/blog/categoria/page')->with('categorias', $categorias);
	}

	public function create() {
		return view('backend/blog/categoria/create');
	}

	public function store(BlogCategoriaRequest $request) {
		$input = $request->all();
		if ($this->repository->store($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('blog.categoria.index');

	}

	public function edit($id) {
		$categoria = $this->repository->show($id);
		return view('backend/blog/categoria/edit')->with('categoria', $categoria);
	}

	public function update(BlogCategoriaRequest $request, $id) {
		$input = $request->all();
		if ($this->repository->update($input, $id)) {
			Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('blog.categoria.index');
	}

	public function destroy($id) {
		if ($this->repository->destroy($id)) {
			Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('blog.categoria.index');
	}
}
