<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'choice_1' => 'required|string',
            'choice_2'=> 'required|string',
            'choice_3'=> 'required|string',
            'choice_4'=> 'required|string',
            'right_answer'=> 'required|string',
            'quiz_id'=> 'required|exists:quizzes,id',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
