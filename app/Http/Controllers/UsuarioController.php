<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Prowork\Usuario\Repositories\UsuarioRepository;
use App\User;
use Notifications;
use Artesaos\Defender\Repositories\Eloquent\EloquentPermissionRepository as PermissionRepository;

class UsuarioController extends Controller {

    protected $repository;
    protected $permissionRepository;

    public function __construct(UsuarioRepository $repository, PermissionRepository $permissionRepository) {
        $this->repository = $repository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index() {
        $usuarios = $this->repository->showUsuarios();
        $administradores = $this->repository->showAdmins();
        return view('backend/usuario/usuario/page', compact('usuarios', 'administradores'));
    }

    public function createUsuario() {
        return view('backend/usuario/usuario/create');
    }

    public function storeUsuario(InsertUsuarioRequest $request) {
        $thumbs = array(['width' => '150', 'height' => '150']);
        $input = $request->except('ae', 'bv', 'blog', 'enquete', 'gi', 'gv', 'und', 'usuario', 'banner', 'motorista', 'operacao', 'rastreio', 'rd', 'institucional', 'cursos');
        $permissao_list = $request->except(['name', 'email', 'imagem_perfil', 'password', 'password_confirmation', '_token']);
        if ($this->repository->storeUsuario($input, $permissao_list, $thumbs)) {
            Notifications::add('Registro incluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('usuario.index');
    }

    public function editUsuario($id) {
        if ($id == 1) { //se o usuario for o master nao permite editar retorna para listagem de usuarios.
            return redirect()->route('usuario.index');
        } else {
            $usuario = $this->repository->showUsuario($id);
            $permissoes = $usuario->permissions;
            return view('backend/usuario/usuario/edit', compact('usuario', 'permissoes'));
        }
    }

    public function updateUsuario(UpdateUsuarioRequest $request, $id) {
        $thumbs = array(['width' => '150', 'height' => '150']);
        $input = $request->except('ae', 'bv', 'blog', 'enquete', 'gi', 'gv', 'und', 'usuario', 'banner', 'motorista', 'operacao', 'rastreio', 'rd', 'institucional', 'cursos');
        $permissao_list = $request->except(['name', 'email', 'imagem_perfil', '_token']);
        if ($this->repository->updateUsuario($input, $permissao_list, $id, $thumbs)) {
            Notifications::add('Registro Alterado com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('usuario.index');
    }

    public function destroyUsuario($id) {
        if ($this->repository->destroyUsuario($id)) {
            Notifications::add('Registro excluído com sucesso!', 'success', 'operacao');
        } else {
            Notifications::add('Ocorreu um erro ao realizar a operação.', 'danger', 'operacao');
        }
        return redirect()->route('usuario.index');
    }

}
