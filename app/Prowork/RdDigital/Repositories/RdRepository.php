<?php

namespace App\Prowork\RdDigital\Repositories;

use App\Prowork\RdDigital\Models\RdArquivo;
use App\Prowork\Base\Repositories\FileRepository;
use Config;
use DB;
use Illuminate\Support\Facades\Storage;

class RdRepository {

    protected $fileRepository;

    public function __construct(FileRepository $fileRepository) {
        $this->fileRepository = $fileRepository;
    }

    public function storeArquivo($input) {
        
        $input['nome'] = mb_strtolower($input['file']->getClientOriginalName(), 'UTF-8');
        
        $caminho = $input['armazenamento'] . '/' . $input['ano'] . '/' . $input['regiao'] . '/' . $input['campanha'] . '/' . $input['setor'] . '/';
        $file = $this->fileRepository->sendFile($input['file'], $caminho, Config::get('prowork.projeto'));
        $input['arquivo'] = $file;
        
        
        try {
            RdArquivo::create($input);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function paginateArquivos($filtros = array(), $qtdPorPag) {
        $arquivos = RdArquivo::where(function ($query) use (&$filtros) {
                    if (isset($filtros['filtro_pesquisa']) && $filtros['filtro_pesquisa'] != '') {
                        $query->where('nome', 'like', "%" . $filtros['filtro_pesquisa'] . "%");
                    }
                    if (isset($filtros['filtro_armazenamento']) && $filtros['filtro_armazenamento'] != '') {
                        $query->where('armazenamento', 'like', "%" . $filtros['filtro_armazenamento'] . "%");
                    }
                    if (isset($filtros['filtro_ano']) && $filtros['filtro_ano'] != '') {
                        $query->where('ano', 'like', "%" . $filtros['filtro_ano'] . "%");
                    }
                    if (isset($filtros['filtro_regiao']) && $filtros['filtro_regiao'] != '') {
                        $query->where('regiao', 'like', "%" . $filtros['filtro_regiao'] . "%");
                    }
                    if (isset($filtros['filtro_campanha']) && $filtros['filtro_campanha'] != '') {
                        $query->where('campanha', 'like', "%" . $filtros['filtro_campanha'] . "%");
                    }
                    if (isset($filtros['filtro_setor']) && $filtros['filtro_setor'] != '') {
                        $query->where('setor', 'like', "%" . $filtros['filtro_setor'] . "%");
                    }
                })
                ->orderBy('nome', 'asc')
                ->orderBy('created_at', 'desc')
                ->paginate($qtdPorPag);

        return $arquivos;
    }

    public function destroyArquivo($id) {
        try {
            $arquivo = RdArquivo::find($id);
            $this->deletaArquivoS3($arquivo);
            $arquivo->delete();
            return true;
        } catch (Exception $e) {
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

}
