<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FriendController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DashBoard\ProductController;
use Illuminate\Support\Facades\Route;




// Register user
Route::post('/register', [AuthController::class, 'register']);
// Login user
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum'] ], function ()
{
    // Logout
    Route::get('logout', [AuthController::class, 'logout']);

    // Edit User Info
    Route::prefix('account')->group( function () {

        Route::get('/show_profile', [UserController::class, 'get_profile']);
        Route::post('/update', [UserController::class, 'update_user']);
        Route::post('/delete', [UserController::class, 'delete_user_account']);
        Route::post('/block',[UserController::class,'block_user']);
        Route::post('/add_friend',[UserController::class,'add_friend']);
        Route::post('/can_publish',[UserController::class, 'can_publish']);
    });

    // shop
    Route::prefix('shop')->group( function () {
        Route::get('/',[ShopController::class,'get_shop']);
        Route::post('/create',[ShopController::class,'create_shop']);
        Route::post('/update', [ShopController::class, 'update_shop']);
        Route::post('/delete', [ShopController::class, 'delete_shop']);
    });
    //category
    Route::prefix('/category')->group(function ()
    {
        Route::get('/all',[CategoryController::class,'get_all_categories']);
        Route::get('/one_category',[CategoryController::class, 'get_one_category']);
        Route::post('/create',[CategoryController::class,'create_category']);
        Route::post('/update',[CategoryController::class,'update_category']);
        Route::delete('/delete',[CategoryController::class,'delete_category']);
    });

    //product
    Route::prefix('/product')->group(function ()
    {
        Route::get('/all',[ProductController::class,'get_all_products']);
        Route::get('/one_product',[ProductController::class, 'get_one_product']);
        Route::post('/create',[ProductController::class,'create_product']);
        Route::post('/update_to_make_discount',[ProductController::class,'discount']);
        Route::delete('/delete',[ProductController::class,'delete_product']);
    });
});
