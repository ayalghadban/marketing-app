<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\SearchProductsRequest;
use App\Http\Requests\DashBoard\Product\GetProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct (private ProductService  $service){
    }

    
    public function get_product(GetProductRequest $request)
    {
        $success = $this->service->get_one_product($request);
        return $this->sendResponse('', $success);
    }
}
