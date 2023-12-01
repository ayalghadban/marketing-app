<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashBoard\User\GetUserRequest;
use App\Http\Requests\DashBoard\User\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{

    public function __construct(private UserService $userService){
    }

    //get user information
    public function get_profile()
    {
        $user = auth()->user();
        $success = $this->userService->get_one_user($user->id);

        return $this->sendResponse('', $success);

    }

    //update user information
    public function update_user(UserRequest $request, GetUserRequest $id)
    {
        $user = auth()->user();
        $success = $this->userService->update_user($request,$id);

        return $this->sendResponse(__('messages.updated_successfully'), $success);
    }

    //delete user account
    public function delete_user_account()
    {
        $user = auth()->user();

        $success = $this->userService->delete_user($user->id);
        return $this->sendResponse(__('messages.account_deleted_sucsessfully'), $success);
    }

    //block user
   /* public function block_user()
    {
        $user = auth()->user();

        $success = $this->userService->block_user($user->id);
        return $this->sendResponse(__('messages.block_user'), $success);
    }

    //can publish
    public function can_publish()
    {
        $user = auth()->user();

        $success = $this->userService->can_publish($user->id);
        return $this->sendResponse(__('messages.can_publish'), $success);
    }

    //add friend
    public function add_friend()
    {
        $user = auth()->user();

        $success = $this->userService->add_friend($user->id);
        return $this->sendResponse(__('messages.add_friend'), $success);
    }*/
}
