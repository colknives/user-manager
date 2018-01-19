<?php namespace App\Repositories\Interfaces;

interface UserInterface
{

	public function all();

	public function fetch();

	public function findById($id);

	public function findByUsername($data);

	public function search($fields = [], $search = [], $first = false);

	public function insert($data);

	public function update($id, $data);

	public function delete($id);

}