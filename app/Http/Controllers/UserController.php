<?php

namespace App\Http\Controllers;
use App\Services\UserApiService;
use App\Services\UserViewService;
use App\Utils\ConstantStrings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends ApiController
{
    public function userInfo(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = $request->user();
        return $this->sendResponse($user, ConstantStrings::$UserLoggedIn);
    }

    public function getUsersList(): \Illuminate\Http\JsonResponse
    {
        $users = DB::table('users')->paginate(10);

        return $this->sendResponse($users, ConstantStrings::$ListRetrieved);
    }
}
