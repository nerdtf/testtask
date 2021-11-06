<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendResponse($validator->errors(),409);
        }
        $credentials = $validator->validated();

        if (! $token = Auth::attempt($credentials)) {
            return $this->sendResponse('Unauthorized', 401);
        }
        return $this->respondWithToken($token);
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendResponse($validator->errors(),409);
        }
        $data = $validator->validated();
        $data['password'] = app('hash')->make($data['password']);
        User::create($data);
        //should I return token or instance or smth else idk. There is no info about it in task's document
        return $this->sendResponse('success');
    }

}
