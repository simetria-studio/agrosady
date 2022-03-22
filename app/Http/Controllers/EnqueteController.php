<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Prowork\Enquete\Repositories\EnqueteRepository;
use App\Http\Requests\EnqueteRequest;
use Illuminate\Http\Request;
use Notifications;

class EnqueteController extends Controller {

	protected $enqueteRepository;

	public function __construct(EnqueteRepository $enqueteRepository) {
		$this->enqueteRepository = $enqueteRepository;
	}

	public function index(Request $request) {
		$filter = $request->input();
		$enquetes = $this->enqueteRepository->paginate($filter, 10);

		return view('backend/enquete/page')->with(['enquetes' => $enquetes]);
	}

	public function create() {
		return view('backend/enquete/create');
	}

	public function store(EnqueteRequest $request) {
		$input = $request->except('opcoes');
		$opcoes = $request->only('opcoes');

		if ($this->enqueteRepository->store($input, $opcoes)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('enquete.index');

	}

	public function destroy($id) {
		if ($this->enqueteRepository->destroy($id)) {
			Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('enquete.index', $id);
	}

	public function verResultado($id) {
		$enquete = $this->enqueteRepository->show($id);
		return view('backend/enquete/resultado')->with('enquete', $enquete);
	}

	

}
