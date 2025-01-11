<?php

namespace App\Http\Controllers\V1\Service;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services =  Service::select(['name', 'id'])->with('providerOffers')->get();
        return $this->respondWithCustomData($services);
    }

    public function getOfferForAParticularService(string $id): \Illuminate\Http\JsonResponse
    {
        $services =  Service::select(['name', 'id'])->with('providerOffers.provider.user')->find($id);
        return $this->respondWithCustomData($services);
    }

}
