<?php

namespace App\Prowork\Usuario\Repositories;

use App\Prowork\Base\Repositories\ImageRepository;
use App\Prowork\Ged\Models\GedPasta;
use App\User;
use Defender;
use Illuminate\Support\Facades\Storage;
use DB;
use Config;
use Illuminate\Support\Facades\Auth;

class UsuarioRepository {

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
    }

    public function index() {
        return 'index';
    }

    public function showAdmins() {
        $user = User::where(function ($query) {
                    $query->where('id', '!=', 1);
                    $query->whereHas('roles', function($q) {
                        $q->where('name', 'Administrador');
                    });
                })->get();
        return $user;
    }

    public function showUsuarios() {
        $user = User::where(function ($query) {
                    $query->where('id', '!=', 1);
                    $query->whereHas('roles', function($q) {
                        $q->where('name', 'Usuario');
                    });
                })->get();
        return $user;
    }

    public function dataForSelect() {
        $usuarios = User::lists('name', 'id')->all();
        return $usuarios;
    }

    public function showUsuario($id) {
        $user = User::find($id);
        return $user;
    }

    public function storeUsuario($input, $permissao_list, $thumbs = array()) {
        if (isset($input['imagem_perfil']) && $input['imagem_perfil'] != '') {
            $imagem_perfil = $this->imageRepository->sendImage($input['imagem_perfil'], 'usuario/perfil/', Config::get('prowork.projeto'), $thumbs);
            $input['imagem_perfil'] = $imagem_perfil;
        } else {
            $input['imagem_perfil'] = '';
        }
        DB::beginTransaction();
        try {
            $user = User::create([
                        'name' => $input['name'],
                        'email' => $input['email'],
                        'imagem_perfil' => $input['imagem_perfil'],
                        'password' => bcrypt($input['password']),
            ]);
            foreach ($permissao_list as $val) {
                $permission = Defender::findPermission($val);
                $user->attachPermission($permission);
            }
            $user->attachRole(Defender::findRole('Administrador'));
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateUsuario($input, $permissao_list, $id, $thumbs = array()) {
        if (isset($input['imagem_perfil']) && $input['imagem_perfil'] != '') {
            $imagem_perfil = $this->imageRepository->sendImage($input['imagem_perfil'], 'usuario/perfil/', Config::get('prowork.projeto'), $thumbs);
            $input['imagem_perfil'] = $imagem_perfil;
            $this->deletaImagemPerfilS3(User::find($id));
        }
        $permissions = array();
        foreach ($permissao_list as $val) {
            $permission = Defender::findPermission($val);
            $permissions[$permission->id] = ['value' => true];
        }
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->update($input);
            $user->syncPermissions($permissions);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    
    public function storeUsuarioFront($input) {
        DB::beginTransaction();
        try {
            $user = User::create([
                        'name' => $input['name'],
                        'email' => $input['email'],
                        'password' => bcrypt($input['password']),
            ]);
            $user->attachRole(Defender::findRole('Usuario'));
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyUsuario($id) {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $this->deletaImagemPerfilS3($user);
            $user->permissions()->detach();
            $user->roles()->detach();
            $user->und_respostas()->delete();
            $user->enquete_respostas()->delete();
            $user->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function showPermission() {
        $permissions = Defender::permissionsList();
        return $permissions;
    }

    public function deletaImagemPerfilS3($user) {
        $thumbs = array(['width' => '150', 'height' => '150']); //tumb configurado no usuario controler.
        if ($user->imagem_perfil != '') {
            $imagem_perfil = $user->imagem_perfil;
            $nome_img = explode(".", $imagem_perfil);
            try {
                foreach ($thumbs as $val) {
                    Storage::disk('s3')->delete(Config::get('prowork.projeto') . $nome_img[0] . '_' . $val['width'] . 'x' . $val['height'] . '.' . $nome_img[1]); //deletar todos os thumbs.
                }
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $imagem_perfil);
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

}
