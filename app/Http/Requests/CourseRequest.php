<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "teacher_id" => 'required|exists:teachers,id',
            "image" => 'required|url',
            "name" => 'required|string',
            "lesson_duration" => 'required',
            "number_pupils" => 'nullable|integer',
            "description" => 'required|string',
            "who_for" => 'required|array',
            "advantages" => 'nullable',
            "module_count" => 'required|integer',
            "lessons_count" => 'nullable',
            "course_duration" => 'required|string',
            "topics" => 'required|array',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(\response(['message'=>$validator->errors()->first()], 422));
    }
}
