<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentDataRequest;
use App\Http\Requests\UpdateStudentDataRequest;
use App\Interfaces\StudentDataRepositoryInterface;
use Illuminate\Http\Request;

class StudentDataController extends Controller
{
    private StudentDataRepositoryInterface $studentDataRepository;
    public function __construct(StudentDataRepositoryInterface $studentDataRepository)
    {
        $this->studentDataRepository = $studentDataRepository;
    }
    public function list()
    {
        return $this->studentDataRepository->list();
    }

    public function create(StoreStudentDataRequest $request)
    {
        return $this->studentDataRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->studentDataRepository->findById($id);
    }

    public function update(int $id, UpdateStudentDataRequest $request)
    {
        return $this->studentDataRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->studentDataRepository->delete($id);
    }
}
