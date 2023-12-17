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

    public function all()
    {
        return $this->postRepository->paginate();
    }
    public function allUSerPosts($userId){
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
        $post = $this->postRepository->find($id);
        return $this->postRepository->update($post, $data);
    }

    public function delete($id)
    {
        return $this->postRepository->delete($id);
    }

    public function trash()
    {
        return $this->postRepository->trash();
    }

    public function restore($id)
    {
        $post = $this->postRepository->findTrashed($id);
        return $this->postRepository->restore($post);
    }

    public function changeStatus($id)
    {
        $post = $this->postRepository->find($id);
        return $this->postRepository->changeStatus($post);
    }

}
