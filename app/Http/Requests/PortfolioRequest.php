<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PortfolioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' =>'required',
            'name' =>'required|string',
            'url' =>'required|url',
            'description' =>'nullable|string',
            'image' => 'required'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(\response(['message'=>$validator->errors()->first()], 422));
    }
}
