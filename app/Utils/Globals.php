<?php
namespace App\Utils;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Globals{
public function welcomeMessage(): string
{
    $timeOfDay = Carbon::now()->toRfc850String();
    $db_status = $this->checkDatabaseConnection()->content();
    return "Welcome to Estatio!, Today is $timeOfDay [API VERSION:1.0], Database status : $db_status";
}
    public function checkDatabaseConnection(): JsonResponse
    {
        try {
            DB::connection()->getPdo();
            $response = ['status' => 'OK'];
            $status = 200;
        } catch (\Exception $e) {
            $response = ['status' => 'Error', 'message' => $e->getMessage()];
            $status = 500;
        }

        return response()->json($response, $status);
    }
}
