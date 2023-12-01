<?php

namespace App\Services;

use App\Models\Shop;
use App\Models\Shopping;

class ShopService
{


    //get one shop
    public function get_one_shop($request)
    {
        $one_shop = Shopping::where('id', $request->shop_id)->with('user')->get();
        return $one_shop;
    }

    //create new shop
    public function create_shop($request)
    {
        $new_shop = Shopping::create([
            'name' =>$request->name,
            'description' =>$request->description,
            'user_id' =>$request->user_id,
            'image' => $request->image
        ]);
        $new_shop = Shopping::where('name', $request->name)->with('user')->get();
        return $new_shop;
    }

    //update shop
    public function update_shop($request,$id)
    {
        $update = Shopping::where('id',$id->shop_id)
        ->update([
            'name' =>$request->name,
            'description' =>$request->description,
            'user_id' =>$request->user_id,
            'image' => $request->image
        ]);
        $update = Shopping::where('id',$id->shop_id)->with('user')->get();
        return $update;
    }

    //delete shop
    public function delete_shop($request)
    {
        $delete = Shopping::where('id',$request->id)->delete();
        return true;
    }

}
