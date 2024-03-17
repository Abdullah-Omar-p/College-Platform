<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use App\Interfaces\LikeRepositoryInterface;
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
        return $this->likeRepository->list();
    }

    public function create(StoreLikeRequest $request)
    {
        return $this->likeRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->likeRepository->findById($id);
    }

    public function update(int $id, UpdateLikeRequest $request)
    {
        return $this->likeRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->likeRepository->delete($id);
    }
}
