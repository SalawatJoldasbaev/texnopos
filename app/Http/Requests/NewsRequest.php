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
            'employee_id' => 'required|exists:employees,id',
            'title' =>'required|string',
            'image' =>'required|url',
            'date' =>'required|date',
            'body' =>'required',
       ];
    }
}
