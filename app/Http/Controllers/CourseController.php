<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;
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
        $user = auth('sanctum')->user();
        $this->authorize('create', Course::class);
        return $this->courseRepository->create($request->validated(), $user);
    }

    public function findById(int $id)
    {
        return $this->courseRepository->findById($id);
    }

    public function update(int $id, UpdateCourseRequest $request)
    {
        $course = Course::findOrFail($id);
        $this->authorize('update', $course);
        return $this->courseRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        $course = Course::findOrFail($id);
        $this->authorize('delete', $course);
        return $this->courseRepository->delete($id);
    }
}
