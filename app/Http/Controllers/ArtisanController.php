<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends ApiController
{
    public function index()

    {
        return view('artisan.index');
    }

    public function runCommand(Request $request)
    {
        $command = $request->input('command');
        Artisan::call("$command");
        $output = Artisan::output();
        return back()->withMessage($output);;
    }
    public function run(Request $request)
    {

        // Call and Artisan command from within your application.
        $command = $request->input('command');
        Artisan::call("$command");
        $output = Artisan::output();
        return $this->sendResponse(null, "$output");
    }
}
