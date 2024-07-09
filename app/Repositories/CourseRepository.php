<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Controllers\MediaController;
use App\Http\Resources\CourseResource;
use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;
use App\Models\CourseProf;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseRepository implements CourseRepositoryInterface
{
    public function list()
    {
        $courses = Course::with('media')->paginate(10);
        if ($courses->isEmpty()) {
            return Helper::responseData('No courses found', false, null, 404);
        }
        return Helper::responseData('Courses found', true, CourseResource::collection($courses), 200);
    }

    public function addVideo($video)
    {

    }
    public function findById(int $id)
    {
        try {
            $course = Course::query()->with('media')->findOrFail($id);
            return Helper::responseData('Success', true, CourseResource::make($course), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Course Not Found', false, null, 404);
        }
    }

    public function create(array $details, $user)
    {
        $course = Course::create($details);
        CourseProf::create([
            'course_id' => $course->id,
            'prof_id' => $user->id
        ]);
        $mimeType = $details['media']->getMimeType();
        if (isset($details['media'])) {
            MediaController::saveMedia($details, $mimeType, $course, Course::class);
        }
        $course->load('media');
        return Helper::responseData('Course Added Successfully', true, CourseResource::make($course), 200);
    }

    public function update(int $id, array $details)
    {
        $course = Course::findOrFail($id);
        $course->update($details);
        if (isset($details['media'])) {
            $mimeType = $details['media']->getMimeType();
            MediaController::updateMedia($details, $mimeType, $course, Course::class, $id);
        }
        $course->load('media');
        return Helper::responseData('Course Updated Successfully', true, CourseResource::make($course), 200);
    }

    public function delete(int $id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->delete();
            // .. Delete related CourseProf entries ..
            CourseProf::where('course_id', $course->id)->delete();
            // .. Delete All Media Related To This Course ..
            MediaController::removeMedia($course->id, Course::class);

            return Helper::responseData('Course Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Course Not Found', false, null, 404);
        }
    }

    private function query()
    {
    }
}
