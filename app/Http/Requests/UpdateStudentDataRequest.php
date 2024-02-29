<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:student_data,id',
            'user_id' => 'required|exists:users,id',
            'national_id' => 'required|unique:users,national_id',
            'phone' => 'required|unique:users,phone',
            'address' => 'required|string',
            'family_phone'=>'required|string',
            'email' => 'required|unique:users,email',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
