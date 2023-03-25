<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends ApiController
{

    public function run(Request $request): JsonResponse
    {

        // Call and Artisan command from within your application.
        $command = $request->input('command');
        Artisan::call("$command");
        $output = Artisan::output();
        return $this->sendResponse(null, "$output");
    }
}
