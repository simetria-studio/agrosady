<?php

namespace App\Prowork\BibliotecaVirtual\Repositories;

use App\Prowork\BibliotecaVirtual\Models\BvArquivo;
use App\Prowork\BibliotecaVirtual\Models\BvPasta;
use App\Prowork\Base\Repositories\FileRepository;
use Config;
use Illuminate\Support\Facades\Storage;
use DB;

class BvRepository {

    protected $fileRepository;

    public function __construct(FileRepository $fileRepository) {
        $this->fileRepository = $fileRepository;
    }

    public function showPasta($id) {
        $pasta = BvPasta::find($id);
        return $pasta;
    }

    public function getBySlug($slug) {
        $pasta = BvPasta::findBySlug($slug);
        return $pasta;
    }

    public function storePasta($input) {
        DB::beginTransaction();
        try {
            BvPasta::create($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updatePasta($input, $id) {

        DB::beginTransaction();
        try {
            $pasta = BvPasta::find($id);
            $pasta->update($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroyPasta($id) {
        DB::beginTransaction();
        try {
            $pasta = BvPasta::find($id);
            $this->deletaPastaS3($pasta);
            $pasta->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginatePastas($filtros = array(), $qtdPorPag) {

        $pastas = BvPasta::where(function ($query) use (&$filtros, &$orderBy) {
                    if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
                        $query->where('nome', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                    }
                })
                ->orderBy('nome', 'asc')
                ->paginate($qtdPorPag);

        return $pastas;
    }

    public function storeArquivo($input, $id) {

        $file = $this->fileRepository->sendFile($input['arquivo'], 'bliblioteca-virtual/arquivos/', Config::get('prowork.projeto'));
        $input['arquivo'] = $file;
        DB::beginTransaction();
        try {
            $input['bv_pasta_id'] = $id;
            BvArquivo::create($input);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function paginateArquivos($filtros = array(), $qtdPorPag, $id) {

        $arquivos = BvArquivo::where(function ($query) use (&$filtros, &$id) {
//                    metodo para listar arquivos da pasta com id = $id
                    if (isset($id) && $id != '') {
                        $query->where('bv_pasta_id', '=', $id)
                        ->where('nome', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->with('bv_pasta')
                ->paginate($qtdPorPag);

        return $arquivos;
    }

    public function destroyArquivo($id) {
        DB::beginTransaction();
        try {
            $arquivo = BvArquivo::find($id);
            $this->deletaArquivoS3($arquivo);
            $arquivo->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function deletaArquivoS3($arquivo) {
        try {
            Storage::disk('s3')->delete(Config::get('prowork.projeto') . $arquivo->arquivo);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deletaPastaS3($pasta) {
        try {
            $arquivos = $pasta->arquivos;
            foreach ($arquivos as $arquivo) {
                Storage::disk('s3')->delete(Config::get('prowork.projeto') . $arquivo->arquivo);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
