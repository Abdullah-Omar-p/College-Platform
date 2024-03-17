<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private CourseRepositoryInterface $courseRepository;
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    public function list()
    {
        return $this->courseRepository->list();
    }

    public function create(StoreCourseRequest $request)
    {
        return $this->courseRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->courseRepository->findById($id);
    }

    public function update(int $id, UpdateCourseRequest $request)
    {
        return $this->courseRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->courseRepository->delete($id);
    }
}
