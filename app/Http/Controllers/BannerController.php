<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerImagemRequest;
use App\Prowork\Banner\Repositories\BannerRepository;
use Illuminate\Http\Request;
use Notifications;

class BannerController extends Controller {

	protected $repository;

	public function __construct(BannerRepository $repository) {
		$this->repository = $repository;
	}

	public function index(Request $request) {
		$filter = $request->input();
		$banners = $this->repository->paginate($filter, 10);
		return view('backend/banner/banner/page')->with('banners', $banners);
	}

	public function create() {
		return view('backend/banner/banner/create');
	}

	public function store(BannerRequest $request) {
		$input = $request->all();
		$retorno = $this->repository->store($input);
		if ($retorno) {
			Notifications::add('Operação realizada com sucesso.', 'success', 'operacao');
			return redirect()->route('banner.index');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
	}

	public function edit($id) {
		$banner = $this->repository->show($id);
		return view('backend/banner/banner/edit')->with('banner', $banner);
	}

	public function update(BannerRequest $request, $id) {
		$input = $request->all();
		if ($this->repository->update($input, $id)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('banner.index');
	}

	public function destroy($id) {

		if ($this->repository->destroy($id)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('banner.index');
	}

	/** MÉTODOS IMAGEM * */
	public function indexImagem($id_banner) {
		$imagens = $this->repository->paginateImagem(['filtro_banner' => $id_banner], 10);
		return view('backend/banner/imagem/page')->with(['imagens' => $imagens, 'id_banner' => $id_banner]);
	}

	public function createImagem($id) {
		$banner = $this->repository->show($id);
		return view('backend/banner/imagem/create')->with('banner', $banner);
	}

	public function storeImagem(BannerImagemRequest $request, $id_banner) {
		$input = $request->all();
                
		$input['banner_id'] = $id_banner;
		if ($this->repository->storeImagem($input)) {
			Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('banner.imagem.index', $id_banner);
	}

	public function destroyImagem($id, $id_banner) {

		if ($this->repository->destroyImagem($id)) {
			Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
		} else {
			Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
		}
		return redirect()->route('banner.imagem.index', $id_banner);

	}

}
