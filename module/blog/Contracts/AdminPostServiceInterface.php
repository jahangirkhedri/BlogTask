<?php

namespace Module\blog\Contracts;

interface AdminPostServiceInterface
{
    public function all();
    public function delete($id);
    public function changeStatus($id,$status);
}
