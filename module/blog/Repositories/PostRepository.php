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

    public function allUserPostsPaginated($userId, $limit = 15)
    {
        return Post::where('user_id', $userId)->paginate($limit);
    }

    public function changeStatus($id, $status){
       return Post::where('id',$id)->update([
           'status' => $status
       ]) ;
    }
}
