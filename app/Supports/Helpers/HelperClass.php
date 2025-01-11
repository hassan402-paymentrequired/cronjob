<?php

namespace App\Supports\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HelperClass
{

    public static function generateCode($user): string
    {
        $user = User::find($user);
        $user->update(['verification_code' => mt_rand(1000, 9999)]);
        return $user->verification_code;
    }
    public static function generateToken($user)
    {
        return Auth::login($user);
    }

    public static function saveImage($request, $name, $save_path)
    {
        $path = null;
        if ($request->hasFile($name)) {
            $path = $request->$name->store($save_path, 'public');
        }
        return $path;
    }
}
