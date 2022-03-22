<?php

namespace App\Prowork\Produtos\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;

class ProdutoCategoria extends Model implements SluggableInterface{

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'nome',
        'save_to' => 'slug',
    ];
    protected $fillable = array('nome', 'descricao', 'cat_pai_id', 'caminho');

    public function produtos() {
        return $this->belongsToMany('App\Prowork\Produtos\Models\Produto');
    }

    public function categoria_pai() {
        return $this->belongsTo(self::class, 'cat_pai_id');
    }

    public function categoria_filha() {
        return $this->hasMany(self::class, 'cat_pai_id');
    }

}
