<?php
namespace App\Prowork\Blog\Interfaces;

interface BlogCategoriaInterface {

	public function index();

	public function show($id);

	public function store($input);

	public function update($input, $id);

	public function destroy($id);

	public function paginate($filter, $qtd);

}