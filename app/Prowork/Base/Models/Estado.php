<?php 

namespace App\Prowork\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $fillable = ['nome'];

    public $timestamps = false;

    public function cidades()
    {
        return $this->hasMany('App\Prowork\Base\Models\Cidade');
    }
    public function franquias()
    {
        return $this->hasMany('App\Prowork\Franquia\Models\Franquia');
    }

}
