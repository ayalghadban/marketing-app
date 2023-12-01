<?php

namespace App\Http\Requests\DashBoard\Category;

use App\Http\Requests\BaseRequest;

class CategoryRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' =>'required|string|min:2',
            'shop_id' => 'required|integer|exists:shoppings,id'
        ];
    }
}
