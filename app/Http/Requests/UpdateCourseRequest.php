<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'media' => 'nullable|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-ms-wmv,video/x-flv,video/x-matroska|max:1024000', // max size is 1GB
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
