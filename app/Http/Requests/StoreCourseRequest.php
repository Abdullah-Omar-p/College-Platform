<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'description'=> 'required|string|min:5|max:700',
            'level'=> 'required|string|in:first,second,third,fourth,fifth,sixth,seventh',
            'semester' =>'required|string|in:first,second',
            'units'=>'required|string|in:0,1,2,3,4',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
