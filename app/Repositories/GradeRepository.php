<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\GradeResource;
use App\Interfaces\GradeRepositoryInterface;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GradeRepository implements GradeRepositoryInterface
{
    public function list()
    {
        $grades = Grade::paginate(10);
        if ($grades->isEmpty()) {
            return Helper::responseData('No grades found', false, null, 404);
        }
        return Helper::responseData('Grades found', true, GradeResource::collection($grades), 200);
    }

    public function studentGrades($user)
    {
        $grades = Grade::where('student_id', $user->id)->get();
        return Helper::responseData('Success', true, GradeResource::collection($grades), 200);
    }

    public function findById(int $gradeId)
    {
        try {
            $grade = Grade::findOrFail($gradeId);
            return Helper::responseData('Success', true, GradeResource::make($grade), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Grade Not Found', false, null, 404);
        }
    }

    public function create(array $details)
    {
        $grade = Grade::create($details);
        return Helper::responseData('Grade Added Successfully', true, new GradeResource($grade), 200);
    }

    public function update(int $gradeId, array $details)
    {
        Grade::where('id', $gradeId)->update($details);
        $grade = Grade::find($gradeId);
        return Helper::responseData('Grade Updated Successfully', true, new GradeResource($grade), 200);
    }

    public function delete(int $gradeId)
    {
        try {
            $grade = Grade::findOrFail($gradeId);
            $grade->delete();
            return Helper::responseData('Grade Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Grade Not Found', false, null, 404);
        }
    }
}
