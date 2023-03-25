<?php
namespace App\Utils;

use Illuminate\Support\Carbon;

$timeOfDay = Carbon::now()->toRfc850String();
class ConstantStrings{
    static string $SucessMessage = "Sucessfull";
    static string $PushNotificationSent = "Push notification was sent Successfully";
    static string $ListRetrieved = "List retrieved successfully";
    static string $UserLoggedIn = "User login successfully.";

}
