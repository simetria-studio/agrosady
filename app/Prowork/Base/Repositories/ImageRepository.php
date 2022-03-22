<?php

namespace App\Prowork\Base\Repositories;

use Image;
use Storage;

class ImageRepository {

    public function sendImage($img, $path, $projeto, $thumbs = array()) {
        try {

            $nome_completo = mb_strtolower($img->getClientOriginalName(), 'UTF-8');
            $ext = '.' . pathinfo($nome_completo, PATHINFO_EXTENSION);
            $nomeUnico = md5(uniqid(time()));
            $imagem = Image::make($img);

            $img->move(storage_path() . '/app', $nomeUnico);
            $uploadedfile = Storage::get($nomeUnico);

            $disk = Storage::disk('s3');
            $disk->put($projeto . $path . $nomeUnico . $ext, $uploadedfile);
            Storage::delete($nomeUnico);

            if (count($thumbs > 0)) {
                foreach ($thumbs as $val) {
                    $thumb = $imagem;
                    $thumb->fit($val['width'], $val['height']);
                    $arq = (string) $thumb->encode('', 80);
                    Storage::disk('s3')->put($projeto . $path . $nomeUnico . '_' . $val['width'] . 'x' . $val['height'] . $ext, $arq);
                }
            }

            return $path . $nomeUnico . $ext;
        } catch (Exception $t) {
            return $t;
        }
    }

}
