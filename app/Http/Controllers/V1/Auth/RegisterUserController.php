<?php

namespace  App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\RegisterUserRequest;
use App\Models\User;
use App\Notifications\V1\ResendCodeNotification;
use App\Supports\Helpers\HelperClass;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{


    public function store(RegisterUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $path = HelperClass::saveImage($request, 'profile_picture', 'profile_images');
        $user = User::create(array_merge(
            Arr::except($request->all(), ['profile_picture', 'password_confirmation']),
            ['profile_picture' => $path]
        ));
        $token = HelperClass::generateToken($user);
        return $this->respondWithProxyData(['token' => $token, 'message' => 'Verify the code that was sent to your mail'], 201);
    }

    public function verifyCode(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'code' => ['required', 'string', 'min:4', 'max:4']
        ]);

        $user = $request->user();
        if ($user->verification_code !== $request->code)
            return $this->respondWithProxyData(['message' => 'Invalid verification code.'], 404);


        $user->update(['is_verified' => true, 'verification_code' => null]);
        return $this->respondWithProxyData(['message' => 'Account verify successfully'], 200);
    }


    public function requestNewOtp(): \Illuminate\Http\JsonResponse
    {

        $code = HelperClass::generateCode(Auth::id());
        auth()->user()->notify(new ResendCodeNotification($code, auth()->user()->first_name));
        return $this->respondWithProxyData(['message' => 'Code resend successfully'], 200);
    }
}
