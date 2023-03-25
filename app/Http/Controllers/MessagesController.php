<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class MessagesController extends ApiController
{
    public  function getAllMessages(): \Illuminate\Http\JsonResponse
    {
        $messages = DB::table('messages')->paginate(10);

        return $this->sendResponse($messages,'Messages retrieved successfully');
    }

}
