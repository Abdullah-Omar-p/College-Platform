<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\QuizResource;
use App\Interfaces\QuizRepositoryInterface;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuizRepository implements QuizRepositoryInterface
{
    public function list()
    {
        $quizzes = Quiz::paginate(10);
        if ($quizzes->isEmpty()) {
            return Helper::responseData('No quizzes found', false, null, 404);
        }
        return Helper::responseData('Quizzes found', true, QuizResource::collection($quizzes), 200);
    }

    public function findById(int $quizId)
    {
        try {
            $quiz = Quiz::findOrFail($quizId);
            return Helper::responseData('Success', true, QuizResource::make($quiz), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Quiz Not Found', false, null, 404);
        }
    }

    public function create(array $details, $user)
    {
        $input = $details;
        $input['prof_id'] = $user->id;
        $quiz = Quiz::create($input);
        return Helper::responseData('Quiz Added Successfully', true, new QuizResource($quiz), 200);
    }

    public function update(int $quizId, array $details)
    {
        Quiz::where('id', $quizId)->update($details);
        $quiz = Quiz::find($quizId);
        return Helper::responseData('Quiz Updated Successfully', true, new QuizResource($quiz), 200);
    }

    public function delete(int $quizId)
    {
        try {
            $quiz = Quiz::findOrFail($quizId);
            $quiz->delete();
            return Helper::responseData('Quiz Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Quiz Not Found', false, null, 404);
        }
    }
}
