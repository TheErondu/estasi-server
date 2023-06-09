<?php
namespace App\Utils;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Globals{
public function welcomeMessage(): string
{
    $timeOfDay = Carbon::now()->toRfc850String();
    $db_status = $this->checkDatabaseConnection();
    return "Welcome to Estatio!, Today is $timeOfDay [API VERSION:1.0], Database connection is - $db_status";
}
    public function checkDatabaseConnection(): string
    {
        try {
            DB::connection()->getPdo();
            $response = 'OK';
            $status = 200;
        } catch (\Exception $e) {
            $response = $e->getMessage();
            $status = 500;
        }

        return "$response, status: $status";
    }
}
