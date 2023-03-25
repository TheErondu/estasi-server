<?php

namespace App\Services;

use App\Utils\ConstantStrings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserApiService
{
    public function userInfo(Request $request)
    {
        $user = $request->user();
        return $this->sendResponse($user, ConstantStrings::$UserLoggedIn);
    }

    public function getUsersList()
    {
        $users = DB::table('users')->paginate(10);

        return $this->sendResponse($users, ConstantStrings::$ListRetrieved);
    }
}

