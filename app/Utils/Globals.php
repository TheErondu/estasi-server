<?php
namespace App\Utils;

use Illuminate\Support\Carbon;

class Globals{
public function welcomeMessage(){
    $timeOfDay = Carbon::now()->toRfc850String();
    $welcomeMessage = "Welcome to Estatio!, Today is $timeOfDay [API VERSION:1.0]";
    return $welcomeMessage;
}
}
