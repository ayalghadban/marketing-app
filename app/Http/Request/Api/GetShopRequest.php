<?php

namespace App\Http\Request\Api;

use App\Http\Requests\BaseRequest;

class GetShopRequest extends BaseRequest
{


    public function rules(): array
    {
        return [
            'shop_id' => 'required|integer|exists:shoppings,id'
        ];
    }
}
