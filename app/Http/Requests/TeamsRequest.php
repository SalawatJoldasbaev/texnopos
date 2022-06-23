<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' =>'required|string',
            'image' =>'required|url',
            'profession' =>'required|string',
            'description' =>'required|string'
        ];
    }
}
