<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    // get all categories
    public function get_all_categories()
    {
        $all_categories = Category::with('shop')->get();
        return $all_categories;
    }

    //get one category
    public function get_one_category($request)
    {
        $one_category = Category::where('id', $request->category_id)->with('shop')->get();
        return $one_category;
    }

    //create new category
    public function create_category($request)
    {
        $new_category = Category::create([
            'name' => $request->name,
            'shop_id' => $request->shop_id
        ]);
        $new_category = Category::where('name', $request->name)->with('shop')->get();
        return $new_category;
    }

    //update category
    public function update_category($request,$id)
    {
        $update = Category::where('id',$id->category_id)
        ->update([
            'name' =>$request->name,
            'shop_id' => $request->shop_id
        ]);
        $update = Category::where('id',$id->category_id)->with('shop')->get();
        return $update;
    }

    //delete category
    public function delete_category($request)
    {
        $delete = Category::where('id',$request->id)->delete();
        return true;
    }

}
