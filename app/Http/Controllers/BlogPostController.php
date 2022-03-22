<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Prowork\Blog\Interfaces\BlogCategoriaInterface;
use App\Prowork\Blog\Interfaces\BlogPostInterface;
use Illuminate\Http\Request;
use Notifications;

class BlogPostController extends Controller {

    protected $postRepository;
    protected $categoriaRepository;

    public function __construct(BlogPostInterface $postRepository, BlogCategoriaInterface $categoriaRepository) {
        $this->postRepository = $postRepository;
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index(Request $request) {
        $filter = $request->input();
        $posts = $this->postRepository->paginate($filter, 10);
        $categorias = $this->categoriaRepository->dataForSelect();
        return view('backend/blog/post/page')->with(['posts' => $posts, 'categorias' => $categorias]);
    }

    public function visualizadoPor($id) {
        $post = $this->postRepository->getById($id);
        return view('backend/blog/post/visualizado', compact('post'));
    }

    public function create() {
        $categorias = $this->categoriaRepository->dataForSelect();
        return view('backend/blog/post/create')->with(['categorias' => $categorias]);
    }

    public function store(BlogPostRequest $request) {
        $thumbs = array(['width' => '600', 'height' => '325']);

        $input = $request->except('categorias');
        $categorias = $request->only('categorias');
        if ($this->postRepository->store($input, $categorias, $thumbs)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('blog.post.index');
    }

    public function edit($id) {
        $categorias = $this->categoriaRepository->dataForSelect();
        $res = $this->postRepository->show($id);
        $post = $res[0];
        return view('backend/blog/post/edit')->with('post', $post)->with(['categorias' => $categorias]);
    }

    public function update(BlogPostRequest $request, $id) {
        $thumbs = array(['width' => '600', 'height' => '325']);
        $input = $request->except('categorias');
        $categorias = $request->only('categorias');
        if ($this->postRepository->update($input, $categorias, $id, $thumbs)) {
            Notifications::add('Registro atualizado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }

        return redirect()->route('blog.post.index');
    }

    public function destroy($id) {
        if ($this->postRepository->destroy($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('blog.post.index');
    }

}
