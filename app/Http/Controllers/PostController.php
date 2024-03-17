<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function list()
    {
        return $this->postRepository->list();
    }

    public function create(StorePostRequest $request)
    {
        return $this->postRepository->create($request->validated());
    }

    public function findById(int $postId)
    {
        return $this->postRepository->findById($postId);
    }

    public function update(int $postId ,UpdatePostRequest $request)
    {
        return $this->postRepository->update($postId, $request->validated());
    }

    public function delete(int $postId)
    {
        return $this->postRepository->delete($postId);
    }
}
