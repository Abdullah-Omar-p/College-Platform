<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\QuestionResource;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function list()
    {
        $questions = Question::paginate(10);
        if ($questions->isEmpty()) {
            return Helper::responseData('No questions found', false, null, 404);
        }
        return Helper::responseData('Questions found', true, QuestionResource::collection($questions), 200);
    }

    public function userQuestions($user)
    {
        $questions = Question::where('user_id', $user->id)->get();
        return Helper::responseData('Success', true, QuestionResource::collection($questions), 200);
    }

    public function findById(int $questionId)
    {
        try {
            $question = Question::findOrFail($questionId);
            return Helper::responseData('Success', true, QuestionResource::make($question), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Question Not Found', false, null, 404);
        }
    }

    public function create(array $details, $user)
    {
        $input = $details;
        $input['user_id'] = $user->id;
        $question = Question::create($input);
        return Helper::responseData('Question Added Successfully', true, new QuestionResource($question), 200);
    }

    public function update(int $questionId, array $details)
    {
        Question::where('id', $questionId)->update($details);
        $question = Question::find($questionId);
        return Helper::responseData('Question Updated Successfully', true, new QuestionResource($question), 200);
    }

    public function delete(int $questionId)
    {
        try {
            $question = Question::findOrFail($questionId);
            $question->delete();
            return Helper::responseData('Question Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Question Not Found', false, null, 404);
        }
    }
}
