<?php

namespace App\Http\Controllers;
use App\Services\UserApiService;
use App\Services\UserViewService;
use App\Utils\ConstantStrings;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    protected UserApiService $userApiService;
    protected UserViewService $userViewService;

    public function __construct(UserApiService $userApiService, UserViewService $userViewService)
    {
        $this->userApiService = $userApiService;
        $this->userViewService = $userViewService;
    }

    public function userInfo(Request $request){
        return $this->userApiService->userInfo($request);
    }


    public function getUsersList(Request $request)
    {
        if ($request->header('Accept') == 'application/json') {
            return $this->userApiService->getUsersList();
        } else {
            return $this->userViewService->getUsersList();
        }
    }
}
