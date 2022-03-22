<?php
namespace App\Prowork\Base\Presenters;

use Laracasts\Presenter\Presenter;

class BasePresenter extends Presenter {

	public function shortDescription($text, $chars = '150') {
		return mb_substr(strip_tags($text), 0, $chars) . (mb_strlen(strip_tags($text))<=$chars?'':'...');
	}

	public function formatDate($data){
		return date('d/m/Y', strtotime($data));
	} 	
        
        public function formatTime($data){
		return date('H:i', strtotime($data));
	} 

	public function formatDateTime($data){
		return date('d/m/Y H:i:s', strtotime($data));
	} 

	public function getThumbUrl($caminho, $width, $height){
		$ext = strchr($caminho, '.');
		$nome_img = explode(".",$caminho);
		$caminho = $nome_img[0];
		$url = $caminho.'_'.$width.'x'.$height.$ext;
		
		return $url;
	}		

}