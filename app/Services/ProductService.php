<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    // get all products
    public function get_all_products()
    {
        $all_products = Product::with('category')->get();
        return $all_products;
    }

    //get one product
    public function get_one_product($request)
    {
        $one_product = Product::where('id', $request->product_id)->with('category')->get();
        return $one_product;
    }

    //create new product
    public function create_product($request)
    {
        $new_product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
        ]);
        $new_product = Product::where('image', $request->image)->first();
        return $new_product;
    }

    //update product
    public function update_product($request,$id)
    {
        $update = Product::where('id',$id->product_id)
        ->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'discount'=> $request->discount,
            'end_time_discount' => $request->end_time_discount
        ]);

        $update =Product::where('id',$id->product_id)->with('category')->get();
        return $update;
    }

    public function discount($request,$id,$new_price)
    {
        $end = $request->end_time_discount;
        $update = Product::where('id',$id->product_id)
        ->update([
            'discount'=> $new_price,
            'end_time_discount' => $end
        ]);

        $update =Product::where('id',$id->product_id)->with('category')->get();
        return $update;
    }

    //delete category
    public function delete_product($request)
    {
        $delete = Product::where('id',$request->id)->delete();
        return true;
    }


    
}
