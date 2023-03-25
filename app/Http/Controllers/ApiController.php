<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\ConstantStrings;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function index(): JsonResponse
    {

        $response = [
            'success' => true,
            'data'    => null,
            'message' => Controller::getGlobals()->welcomeMessage(),
        ];


        return response()->json($response, 200);
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

    /**
     * success response method.
     *
     * @param $result
     * @param $message
     * @return JsonResponse
     */
    public function sendResponse($result, $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($error, array $errorMessages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
