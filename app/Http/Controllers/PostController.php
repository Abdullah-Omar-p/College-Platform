<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

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
        $user = auth('sanctum')->user();
        $this->authorize('create', Post::class);
        return $this->postRepository->create($request->validated(), $user);
    }

    public function findById(int $postId)
    {
        return $this->postRepository->findById($postId);
    }

    public function update(int $postId ,UpdatePostRequest $request)
    {
        $post = Post::findOrFail($postId);
        $this->authorize('update', $post);
        return $this->postRepository->update($postId, $request->validated());
    }

    public function delete(int $postId)
    {
        $post = Post::findOrFail($postId);
        $this->authorize('delete', $post);
        return $this->postRepository->delete($postId);
    }
}
