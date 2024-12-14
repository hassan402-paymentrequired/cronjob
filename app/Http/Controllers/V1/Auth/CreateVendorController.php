<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewVendorRequest;
use App\Models\Vendor;
use App\Supports\Helpers\HelperClass;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CreateVendorController extends Controller
{
    public function store(NewVendorRequest $request)
    {
        $path = HelperClass::saveVendorBanner($request,'banner');
        $vendor = Vendor::create(
            [
                'name' => $request->name,
                'official_email' => $request->official_email,
                'official_phone_number' => $request->official_phone_number,
                'address' => $request->address,
                'banner' => $path,
                'description' => $request->description,
                'vendor_type' => $request->vendor_type,
                'user_id' => Auth::id()
            ]
        );
        return $this->respondWithProxyData(['message' => 'Store details saved successfully'], 201);
    }
}


