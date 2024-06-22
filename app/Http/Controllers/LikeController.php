<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use App\Interfaces\LikeRepositoryInterface;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    private LikeRepositoryInterface $likeRepository;
    public function __construct(LikeRepositoryInterface $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }
    public function list()
    {
        $this->authorize('list', Like::class);
        return $this->likeRepository->list();
    }

    public function create(StoreLikeRequest $request)
    {
        $user = auth('sanctum')->user();
        $this->authorize('create', Like::class);
        return $this->likeRepository->create($request->validated(), $user);
    }

    public function findById(int $id)
    {
        $this->authorize('findById', Like::class);
        return $this->likeRepository->findById($id);
    }

    public function update(int $id, UpdateLikeRequest $request)
    {
        $like = Like::findOrFail($id);
        $this->authorize('update', $like);
        return $this->likeRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        $like = Like::findOrFail($id);
        $this->authorize('delete', $like);
        return $this->likeRepository->delete($id);
    }
}
