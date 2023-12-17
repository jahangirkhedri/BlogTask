<?php

namespace Module\blog\Repositories;

use App\Repository\Repository;
use Module\blog\Models\Post;

class PostRepository extends Repository
{

    public function model()
    {
        return Post::class;
    }
}
