<?php

namespace App\Repositories;


interface BaseRepositoryInterface
{
    public function create($input);
    public function update($input);
    public function delete();
    public function get($include);

    public function getById($id, $include);
    public function getList($num, $page, $include);

}
