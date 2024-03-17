<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentCourseRequest;
use App\Http\Requests\UpdateStudentCourseRequest;
use App\Interfaces\CourseStudentRepositoryInterface;

class StudentCourseController extends Controller
{
    private CourseStudentRepositoryInterface $studentCourseRepository;
    public function __construct(CourseStudentRepositoryInterface $studentCourseRepository)
    {
        $this->studentCourseRepository = $studentCourseRepository;
    }
    public function list()
    {
        return $this->studentCourseRepository->list();
    }

    public function create(StoreStudentCourseRequest $request)
    {
        return $this->studentCourseRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->studentCourseRepository->findById($id);
    }

    public function update(int $id, UpdateStudentCourseRequest $request)
    {
        return $this->studentCourseRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->studentCourseRepository->delete($id);
    }
}
