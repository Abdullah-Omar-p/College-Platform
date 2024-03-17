<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseProfRequest;
use App\Http\Requests\UpdateCourseProfRequest;
use App\Interfaces\CourseProfRepositoryInterface;

class CourseProfController extends Controller
{
    private CourseProfRepositoryInterface $courseProRepository;
    public function __construct(CourseProfRepositoryInterface $courseProRepository)
    {
        $this->courseProRepository = $courseProRepository;
    }
    public function list()
    {
        return $this->courseProRepository->list();
    }

    public function create(StoreCourseProfRequest $request)
    {
        return $this->courseProRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->courseProRepository->findById($id);
    }

    public function update(int $id, UpdateCourseProfRequest $request)
    {
        return $this->courseProRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->courseProRepository->delete($id);
    }
}
