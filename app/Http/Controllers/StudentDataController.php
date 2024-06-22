<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentDataRequest;
use App\Http\Requests\UpdateStudentDataRequest;
use App\Interfaces\StudentDataRepositoryInterface;
use App\Models\StudentData;
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
        $this->authorize('list',StudentData::class);
        return $this->studentDataRepository->list();
    }

    public function create(StoreStudentDataRequest $request)
    {
        $this->authorize('create',StudentData::class);
        return $this->studentDataRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        $this->authorize('findById',StudentData::class);
        return $this->studentDataRepository->findById($id);
    }

    public function update(int $id, UpdateStudentDataRequest $request)
    {
        $data = StudentData::findOrFail($id);
        $this->authorize('update', $data);
        return $this->studentDataRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        $data = StudentData::findOrFail($id);
        $this->authorize('delete', $data);
        return $this->studentDataRepository->delete($id);
    }
}
