<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Request\Api\GetShopRequest;
use App\Http\Request\Api\ShopRequest;
use App\Services\ShopService;

class ShopController extends Controller
{
    public  function __construct (private ShopService  $service){
    }

    // get one shop
    public function get_one_shop(GetShopRequest $request)
    {
        $one_shop = $this->service->get_one_shop($request);
        return $this->sendResponse(__('messages.gat_one_shop'),$one_shop);
    }

    //create categgory
    public function create_shop(ShopRequest $request)
    {
        $new_shop = $this->service->create_shop($request);
        return $this-> sendResponse(__('messages.create_shop'),$new_shop);
    }

    //update shop
    public function update_shop(ShopRequest $request, GetShopRequest $id)
    {
        $update = $this->service->update_shop($request,$id);
        return $this-> sendResponse(__('messages.update_shop'),$update);
    }

    //delete shop
    public function  delete_shop(GetShopRequest $request)
    {
        $delete = $this->service->delete_shop($request);
        return $this-> sendResponse(__('messages.delete_shop'),$delete);
    }
}
