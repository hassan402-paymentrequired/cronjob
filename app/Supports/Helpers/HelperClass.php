<?php

namespace App\Supports\Helpers;

use App\Models\User;

class HelperClass
{

    public static function generateCode($user)
    {
        $user = User::find($user);
        $user->verification_code = mt_rand(1000, 9999);
        $user->save();
        return $user->verification_code;
    }

    public static function saveVendorBanner($request, $name)
    {
        $path = null;
         if ($request->hasFile($name)) {
            $path = $request->$name->store('vendors_banners', 'public');
        }
        return $path;
    }
}
