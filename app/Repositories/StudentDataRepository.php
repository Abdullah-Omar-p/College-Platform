<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\StudentDataResource;
use App\Interfaces\StudentDataRepositoryInterface;
use App\Models\StudentData;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentDataRepository implements StudentDataRepositoryInterface
{
    public function list()
    {
        $students = StudentData::paginate(10);
        if ($students->isEmpty()) {
            return Helper::responseData('No student data found', false, null, 404);
        }
        return Helper::responseData('Student data found', true, StudentDataResource::collection($students), 200);
    }

    public function findById(int $studentId)
    {
        try {
            $student = StudentData::findOrFail($studentId);
            return Helper::responseData('Success', true, StudentDataResource::make($student), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Student data not found', false, null, 404);
        }
    }

    public function create(array $details)
    {
        $student = StudentData::create($details);
        return Helper::responseData('Student data added successfully', true, new StudentDataResource($student), 200);
    }

    public function update(int $studentId, array $details)
    {
        StudentData::where('id', $studentId)->update($details);
        $student = StudentData::find($studentId);
        return Helper::responseData('Student data updated successfully', true, new StudentDataResource($student), 200);
    }

    public function delete(int $studentId)
    {
        try {
            $student = StudentData::findOrFail($studentId);
            $student->delete();
            return Helper::responseData('Student data deleted successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Student data not found', false, null, 404);
        }
    }
}
