<?php
namespace App\Prowork\Und\Interfaces;

interface UndCategoriaInterface {

	public function index();

	public function show($id);

	public function store($input);

	public function update($input, $id);

	public function destroy($id);

	public function paginate($filter, $qtd);

}