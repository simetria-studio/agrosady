<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Artesaos\Defender\Traits\HasDefender;
use Laracasts\Presenter\PresentableTrait;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Authenticatable,
        Authorizable,
        CanResetPassword,
        HasDefender,
        PresentableTrait;

    protected $presenter = \App\Prowork\Usuario\Presenters\UsuarioPresenter::class;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'imagem_perfil'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function und_respostas() {
        return $this->hasMany('App\Prowork\Und\Models\UndResposta');
    }

    public function enquete_respostas() {
        return $this->hasMany('App\Prowork\Enquete\Models\EnqueteResposta');
    }

}
