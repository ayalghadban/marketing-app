<?php

namespace App\Http\Request\Api;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' =>'required|string|min:2',
            'description' =>'required|string',
            'user_id' =>'required|integer|exists:users,id',
            'image' =>'required|string'
        ];
    }
}
