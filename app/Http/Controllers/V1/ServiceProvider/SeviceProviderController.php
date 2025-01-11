<?php

namespace App\Http\Controllers\V1\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProviderOfferRequest;
use App\Http\Requests\V1\ProviderRequest;
use App\Http\Requests\V1\WorkingHourRequest;
use App\Http\Services\ProviderOfferService;
use Illuminate\Http\JsonResponse;

class SeviceProviderController extends Controller
{

    protected $serviceProvider;

    public function __construct(ProviderOfferService $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }

    public function createProvider(ProviderRequest $request): JsonResponse
    {
        return $this->serviceProvider->createProvider($request);
    }

    public function createProviderServiceOffer(ProviderOfferRequest $request)
    {
        return $this->serviceProvider->createProviderOffer($request);
    }

    public function storeWorkingHour(WorkingHourRequest $request): JsonResponse
    {
        return $this->serviceProvider->CreateServiceWorkingHour($request);
    }

    public function getAllCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->serviceProvider->getAllCategory();
    }

    public function getAllServicesOfferedByProvider()
    {
        return $this->serviceProvider->getAllServices();
    }
}
