<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' =>'required|string',
            'image' =>'required|url',
            'date' =>'required|date',
            'body' =>'required',
            'type' =>'required'
        ];
    }
}
