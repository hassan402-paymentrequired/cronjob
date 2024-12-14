<?php

namespace  App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{


    public function store(RegisterUserRequest $request)
    {
        $path = null;
        $user = User::create(Arr::except($request->all(), 'profile_picture'));
        if ($request->hasFile('profile_picture')) {
            $path = $request->profile_picture->store('Profile_images', 'public');
        }
        $user->profile_picture = $path;
        $user->save();
        $token = Auth::login($user);
        return $this->respondWithProxyData(['token' => $token, 'message' => 'Verify the code that was sent to your mail'], 201);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'min:4', 'max:4']
        ]);
        $user = User::where('verification_code', $request->code)->first();
        if (!$user)
            return $this->respondWithProxyData(['message' => 'Invalid verification code.'], 404);
        $user->update(['is_verified' => true, 'verification_code' => null]);
        return $this->respondWithProxyData(['message' => 'Code verify successfully'], 200);
    }
}
