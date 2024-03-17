<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Interfaces\MediaRepositoryInterface;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    private MediaRepositoryInterface $mediaRepository;
    public function __construct(MediaRepositoryInterface $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }
    public function list()
    {
        return $this->mediaRepository->list();
    }

    public function create(StoreMediaRequest $request)
    {
        return $this->mediaRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->mediaRepository->findById($id);
    }

    public function update(int $id, UpdateMediaRequest $request)
    {
        return $this->mediaRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->mediaRepository->delete($id);
    }
}
