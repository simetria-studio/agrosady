<?php 

namespace App\Prowork\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    protected $fillable = ['nome', 'estado_id'];

    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('App\Prowork\Base\Models\Estado');
    }

}
