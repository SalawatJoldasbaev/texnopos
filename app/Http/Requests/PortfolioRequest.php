<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'image'=> 'required'
        ];
    }
}
