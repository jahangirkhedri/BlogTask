<?php

namespace Module\blog\Contracts;

interface PostServiceInterface
{
    public function all($userId);

    public function getById($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);

    public function trash();

    public function restore($id);

    public function changeStatus($id);

}
