<?php

namespace  App\Http\Services;

use App\Http\Requests\V1\ProviderOfferRequest;
use App\Jobs\V1\WorkHourJob;
use App\Models\Provider;
use App\Models\ProviderOffer;
use App\Models\Service;
use App\Models\WorkingHour;
use App\Supports\Helpers\HelperClass;
use App\Supports\ResponseTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProviderOfferService
{
    use ResponseTrait;

    /**
     * create and return a provider info
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProvider($request): \Illuminate\Http\JsonResponse
    {
        $path = HelperClass::saveImage($request, 'image', 'provider_logo');
        Provider::create(array_merge(Arr::except($request->validated(), [
            'image',
        ]), ['user_id' => Auth::id(), 'image' => $path]));

        return $this->responseWithSuccessMessage('Shop created Successfully', 200);
    }

    public function createProviderOffer(ProviderOfferRequest $request)
    {
        $path = HelperClass::saveImage($request, 'image', 'offer_images');

        $offerId = ProviderOffer::create(
            array_merge(
                Arr::except($request->validated(), [
                    'image',
                    'service'
                ]),
                [
                    'image' => $path,
                    'service_id' => $request->service,
                    'provider_id' => auth()->user()->provider->id,
                ]
            )
        );

        return $this->responseWithSuccessMessage($offerId->id, 200);
    }


    public function CreateServiceWorkingHour($request): \Illuminate\Http\JsonResponse
    {
        WorkHourJob::dispatch($request->week_days);
        return $this->responseWithSuccessMessage('Service working hour created Successfully', 200);
    }

    public function getAllCategory(): \Illuminate\Database\Eloquent\Collection
    {
        return Service::select(['name', 'id'])->get();
    }


    /**
     * get all the services of the provider
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function getAllServices(): \Illuminate\Http\JsonResponse
    {
        $provider = auth()->user()->provider;
        $provider = $provider->serviceOffer()->with('service')->get();



        return $this->respondWithCustomData($provider, 200);
    }
}
