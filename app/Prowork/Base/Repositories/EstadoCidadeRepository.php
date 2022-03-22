<?php

namespace App\Prowork\Base\Repositories;

use App\Prowork\Base\Models\Cidade;
use App\Prowork\Base\Models\Estado;

class EstadoCidadeRepository {

    public function getEstadoById($idEstado) {
        $estado = Estado::find($idEstado);
        return $estado;
    }

    public function getEstados() {
        $estados = Estado::lists('estado', 'id');
        return $estados;
    }

    public function getCidades($estado) {
        $cidades = $estado->cidades()->getQuery()->get(['id', 'cidade']);
        return $cidades;
    }
    

}
