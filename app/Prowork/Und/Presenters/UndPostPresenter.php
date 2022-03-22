<?php
namespace App\Prowork\Und\Presenters;

use App\Prowork\Base\Presenters\BasePresenter;

class UndPostPresenter extends BasePresenter {

	public function formatCategorias($categorias) {
		$cat = '';
		for ($i = 0; $i < count($categorias); $i++) {
			$cat .= $i == count($categorias) - 1 ? $categorias[$i]->nome : $categorias[$i]->nome . ', ';
		}
		return $cat;
	}

	public function getResultadoProva() {
		$users = array();

		foreach ($this->perguntas as $p) {
			foreach ($p->respostas as $r) {
				if (isset($users[$r->user->name])) {
					if ($r->resposta == $p->opcao_correta) {
						$users[$r->user->name]++;
					}
				} else {
					if ($r->resposta == $p->opcao_correta) {
						$users[$r->user->name] = 1;
					} else {
						$users[$r->user->name] = 0;
					}

				}

			}
		}
		$qtd_pergunta = count($this->perguntas);
		foreach ($users as $key => $val) {
			$users[$key] = ($val * 100) / $qtd_pergunta . '%';
		}
		return $users;
	}

}