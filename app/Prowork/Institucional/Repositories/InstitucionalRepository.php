<?php

namespace App\Prowork\Institucional\Repositories;

use App\Prowork\Institucional\Models\Institucional;
use DB;

class InstitucionalRepository {

    public function showPaginas() {
        $paginas = Institucional::all();
        return $paginas;
    }
    public function showPagina($id) {
        $pagina = Institucional::find($id);
        return $pagina;
    }
    public function showPaginaNome($nome) {
        $pagina = Institucional::where('pagina', '=', $nome)->get();
        return $pagina;
    }
    
    public function getBySlug($slug) {
        $pagina = Institucional::findBySlug($slug);
        return $pagina;
    }

    public function storePagina($input) {
        DB::beginTransaction();
        try {
            Institucional::create($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updatePagina($input, $id) {
        $pagina = Institucional::find($id);
//        dd($input);
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
            $pagina = Institucional::find($id);
            $pagina->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

}
