<?php
namespace App\Prowork\Und\Interfaces;

interface UndPostInterface {

	public function index();

	public function show($id);

	public function store($input, $categorias);

	public function update($input, $categorias, $id);

	public function destroy($id);

	public function paginate($filter, $qtd);

}