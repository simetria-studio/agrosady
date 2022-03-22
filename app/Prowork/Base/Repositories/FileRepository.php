<?php

namespace App\Prowork\Base\Repositories;

use Storage;

class FileRepository {

    public function sendFile($file, $path, $projeto) {
        try {

//            $ext = strtolower(strchr($file->getClientOriginalName(), '.'));
//            $nomeUnico = md5(uniqid(time())) . $ext;
            
//            $ext = strtolower(strchr($file->getClientOriginalName(), '.'));
//            $nome = explode('.', mb_strtolower($file->getClientOriginalName(), 'UTF-8'));
            
            $nome_completo = mb_strtolower($file->getClientOriginalName(), 'UTF-8');
            $ext = pathinfo($nome_completo, PATHINFO_EXTENSION);
            $nome = explode('.' . $ext, $nome_completo);
            $nome = str_replace([' ', '+', '_', '.', '*', '(', ')', ',', ';', ':', '|', '!', '"', '#', '$', '%', '&', '@', '/', '=', '?', '~', '^', '>', '<', 'ª', 'º'], "-", $nome[0]);
            $nome = str_replace(['--', '---', '----', '-----', '------'], "-", $nome);

            $nomeUnico = $nome . '_' . date("d-m-Y_H-i-s") . '.' . $ext;

            $file->move(storage_path() . '/app', $nomeUnico);

            $uploadedfile = Storage::get($nomeUnico);
            Storage::disk('s3')->put($projeto . $path . $nomeUnico, $uploadedfile);
            Storage::delete($nomeUnico);


            return $path . $nomeUnico;
        } catch (Exception $t) {
            return $t;
        }
    }
}
