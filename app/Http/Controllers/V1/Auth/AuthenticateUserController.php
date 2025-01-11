<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LoginRequest;
use App\Http\Requests\V1\ProviderLoginRequest;
use App\Models\User;
use App\Supports\Helpers\HelperClass;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateUserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('phone_number', $request->phone_number)->first();

        if ($user) {
            $token = HelperClass::generateToken($user);
            HelperClass::generateCode($user->id);
            return $this->respondWithProxyData(['token' => $token, 'message' => 'Verify the code that was sent to your mail'], 200);
        } else {
            return $this->respondWithProxyData(['message' => 'Invalid phone number or password'], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);
        return $this->respondWithProxyData(['message' => 'Logged out successfully'], 200);
    }

    public function authenticatedUser(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }

    public function authenticateProvider(ProviderLoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $token = Auth::attempt($request->validated());
        if (!$token) {
            return $this->respondWithProxyData(['message' => 'Invalid email or password'], 400);
        }
        return $this->respondWithProxyData(['token' => $token, 'message' => 'Logged in successfully'], 200);

    }
}
