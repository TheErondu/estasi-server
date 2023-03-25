<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class PushNotificationController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeToken(Request $request)
    {
        auth()->user()->update(['push_token' => $request->token]);
        return $this->sendResponse(null, 'Device Push Token has been registered successfully.');
    }
}
