<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UndPostRequest;
use App\Prowork\Und\Interfaces\UndCategoriaInterface;
use App\Prowork\Und\Interfaces\UndPostInterface;
use Illuminate\Http\Request;
use Notifications;

class UndPostController extends Controller {

    protected $postRepository;
    protected $categoriaRepository;

    public function __construct(UndPostInterface $postRepository, UndCategoriaInterface $categoriaRepository) {
        $this->postRepository = $postRepository;
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index(Request $request) {
        $filter = $request->input();
        $posts = $this->postRepository->paginate($filter, 10);
        $categorias = $this->categoriaRepository->dataForSelect();
        return view('backend/und/post/page')->with(['posts' => $posts, 'categorias' => $categorias]);
    }

    public function create() {
        $categorias = $this->categoriaRepository->dataForSelect();
        return view('backend/und/post/create')->with(['categorias' => $categorias]);
    }

    public function store(UndPostRequest $request) {

        $thumbs = array(['width' => '1345', 'height' => '450']);
        $input = $request->except('categorias');
        $categorias = $request->only('categorias');
        if ($this->postRepository->store($input, $categorias, $thumbs)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('und.post.index');
    }

    public function edit($id) {
        $categorias = $this->categoriaRepository->dataForSelect();
        $res = $this->postRepository->show($id);
        $post = $res[0];
        return view('backend/und/post/edit')->with('post', $post)->with(['categorias' => $categorias]);
    }

    public function update(UndPostRequest $request, $id) {

        $thumbs = array(['width' => '1345', 'height' => '450']);
        $input = $request->except('categorias');
        $categorias = $request->only('categorias');
        if ($this->postRepository->update($input, $categorias, $id, $thumbs)) {
            Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }

        return redirect()->route('und.post.index');
    }

    public function destroy($id) {
        if ($this->postRepository->destroy($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('und.post.index');
    }

}
