<?php

namespace Module\blog\Services;

use Module\blog\Contracts\PostServiceInterface;
use Module\blog\Repositories\PostRepository;

class PostService implements PostServiceInterface
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function all($userId)
    {
        return $this->postRepository->allUserPostsPaginated($userId);
    }

    public function getById($id)
    {
        return $this->postRepository->find($id);
    }

    public function create($data)
    {
        return $this->postRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->postRepository->update($id, $data);
    }


}
