<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Interfaces\CommentRepositoryInterface;
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
        return $this->commentRepository->create($request->validated());
    }

    public function findById(string $id)
    {
        return $this->commentRepository->findById($id);
    }

    public function update(string $id, UpdateCommentRequest $request)
    {
        return $this->commentRepository->update($id, $request->validated());
    }

    public function delete(string $id)
    {
        return $this->commentRepository->delete($id);
    }
}
