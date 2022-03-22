<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UndPerguntaRequest;
use App\Prowork\Und\Interfaces\UndPostInterface;
use App\Prowork\Und\Repositories\UndProvaRepository;
use App\Prowork\Usuario\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Notifications;

class UndPerguntaController extends Controller {

    protected $provaRepository;
    protected $postRepository;
    protected $usuarioRepository;

    public function __construct(UndProvaRepository $provaRepository, UndPostInterface $postRepository, UsuarioRepository $usuarioRepository) {
        $this->provaRepository = $provaRepository;
        $this->postRepository = $postRepository;
        $this->usuarioRepository = $usuarioRepository;
    }

    public function index(Request $request, $id) {
        $filter = $request->input();
        $perguntas = $this->provaRepository->paginate($filter, 10, $id);
        $post = $this->postRepository->show($id);
        $post = $post[0];

        return view('backend/und/pergunta/page')->with(['perguntas' => $perguntas, 'post' => $post]);
    }

    public function create($id) {
        $post = $this->postRepository->show($id);
        $post = $post[0];
        return view('backend/und/pergunta/create')->with(['post' => $post]);
    }

    public function store(UndPerguntaRequest $request, $id) {
        $input = $request->except('opcoes');
        $input['und_post_id'] = $id;
        $opcoes = $request->only('opcoes');

        if ($this->provaRepository->store($input, $opcoes)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('und.perguntas.index', $id);
    }

    public function destroy($id_pergunta, $id_post) {
        if ($this->provaRepository->destroy($id_pergunta)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('und.perguntas.index', $id_post);
    }

    public function verProva($id) {
        $res = $this->postRepository->show($id);
        $post = $res[0];
        return view('backend/und/pergunta/prova')->with('post', $post);
    }

    public function verResultado($id) {
        $res = $this->postRepository->show($id);
        $post = $res[0];
        return view('backend/und/pergunta/resultado')->with('post', $post);
    }

}
