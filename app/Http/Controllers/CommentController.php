<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private CommentRepositoryInterface $commentRepository;
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    public function list()
    {
        return $this->commentRepository->list();
    }

    public function create(StoreCommentRequest $request)
    {
        $user = auth('sanctum')->user();
        $this->authorize('create', Comment::class);
        return $this->commentRepository->create($request->validated(), $user);
    }

    public function findById(string $id)
    {
        return $this->commentRepository->findById($id);
    }

    public function update(string $id, UpdateCommentRequest $request)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('update', $comment);
        return $this->commentRepository->update($id, $request->validated());
    }

    public function delete(string $id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('delete', $comment);
        return $this->commentRepository->delete($id);
    }
}
