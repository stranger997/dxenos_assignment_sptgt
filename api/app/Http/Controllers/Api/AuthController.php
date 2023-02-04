<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    /**
     * Login user.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function login(Request $request) : JsonResponse
    {
        if (Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::guard('web')->user();

            $userData = [
                'name'  => $user->name,
                'email' => $user->email,
            ];
            $data = [
                'token_type' => 'Bearer',
                'access_token' => $user->createToken('authToken')->accessToken,
                'user' => $userData,
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(['error' => 'Your username or password is wrong.'], 401);
        }
    }
    /**
     * Logout user.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function logout()
    {
        Auth::user()->token()->revoke();
        return response()->json([
            'message' => 'User Logout Success'
        ]);
    }
}
