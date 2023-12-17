<?php

namespace Module\blog\Services;

use Module\blog\Contracts\AdminPostServiceInterface;
use Module\blog\Repositories\PostRepository;

class AdminPostService implements AdminPostServiceInterface
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function all()
    {
        return $this->postRepository->paginate();
    }
    public function delete($id)
    {
        return $this->postRepository->delete($id);
    }
    public function changeStatus($id,$status){
        return $this->postRepository->changeStatus($id,$status);
    }
}
