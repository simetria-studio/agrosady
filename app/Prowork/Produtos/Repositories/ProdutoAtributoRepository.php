<?php

namespace App\Prowork\Produtos\Repositories;

use App\Prowork\Produtos\Models\ProdutoAtributo;
use DB;

class ProdutoAtributoRepository {
    
    public function getById($id) {
        $atributo = ProdutoAtributo::find($id);
        return $atributo;
    }

    public function updateAtributo($input, $id) {
        $atributo = ProdutoAtributo::find($id);
        DB::beginTransaction();
        try {
            $atributo->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyAtributo($id) {
        DB::beginTransaction();
        try {
            $atributo = ProdutoAtributo::find($id);
            $atributo->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

}
