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


    public function trash($limit = 15)
    {
        return Post::onlyTrashed()->paginate($limit);
    }

    public function findTrashed($id)
    {
        return Post::onlyTrashed()->where('id',$id)->firstOrFail();
    }

    public function restore($post)
    {
        return $post->restore();
    }

    public function changeStatus($post)
    {
        return $post->update([
            'status' => !$post->status
        ]);
    }

    public function paginate($limit = 5)
    {
        return Post::with('user')->orderBy('id', 'desc')->paginate($limit);
    }
}
