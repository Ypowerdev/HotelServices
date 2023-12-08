<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Http\Requests\HotelStoreRequest;
use App\Services\Hotel\HotelMethods;
use App\Services\City\CityMethods;
use Illuminate\Http\JsonResponse;

class HotelController extends Controller
{
    public function __construct(
        private HotelMethods $hotelService,
        private CityMethods $cityService
    )
    {
    }

    public function list(): HotelResource
    {
        return HotelResource::collection($this->hotelService->list());
    }

    public function show(int $id): HotelResource
    {
        return new HotelResource($this->hotelService->findHotelId($id));
    }

    public function store(HotelStoreRequest $request): HotelResource
    {
        $cityId = $request->input('city_id');
        $isCityExists = $this->cityService->findCityId($cityId);

        if (!$isCityExists) {
            throw new NotFoundException('City is not found');
        }

        return new HotelResource(
            $this->hotelService->create(
                $request->validated()
            )
        );
    }

    public function update(HotelStoreRequest $request): HotelResource
    {
        return new HotelResource(
            $this->hotelService->update(
                $request->route('id'),
                $request->validated()
            )
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $hotel = $this->hotelService->findHotelId($id);

        if (!$hotel) {
            return new JsonResponse([
               'message' => 'Hotel has not been found'
            ], 404);
        }

        $this->hotelService->destroy($hotel);

        return new JsonResponse([
            'message' => 'Hotel deleted successfully'
        ], 200);
    }
}
