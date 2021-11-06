<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 60
        ], 200);
    }

    protected function sendResponse ($message , $status = 200)
    {
        return response()->json(['message' => $message], $status);
    }
}
