<?php

namespace App\Prowork\Seo\Repositories;

use App\Prowork\Seo\Models\Seo;
use DB;

class SeoRepository {

    public function showPaginas() {
        $paginas = Seo::all();
        return $paginas;
    }
    public function showPagina($id) {
        $pagina = Seo::find($id);
        return $pagina;
    }
    public function showPaginaNome($nome) {
        $pagina = Seo::where('seo_pagina', '=', $nome)->get();
        return $pagina;
    }

    public function storePagina($input) {
        DB::beginTransaction();
        try {
            Seo::create($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updatePagina($input, $id) {
        $pagina = Seo::find($id);
        DB::beginTransaction();
        try {
            $pagina->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyPagina($id) {
        
        DB::beginTransaction();
        try {
            $pagina = Seo::find($id);
            $pagina->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

}
