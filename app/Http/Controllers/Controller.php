<?php

namespace App\Http\Controllers;

use App\Utils\Globals;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    static public function getGlobals(): Globals
    {
        return new Globals;
    }
}
