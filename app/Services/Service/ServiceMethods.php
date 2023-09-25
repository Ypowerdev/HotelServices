<?php 

namespace App\Services\Service;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Models\Hotel;
use App\Services\Hotel\HotelMethods;

class ServiceMethods
{ 

    public function list()
    { 
        return ServiceResource::collection($this->serviceAll());
    }

    public function create($data): Service
    { 
        return Service::create($data); 
    }

    public function update($id, array $data)
    { 
        $service = $this->findServiceId($id);
        $service->update($data);

        return $service;
    }

    public function serviceAll(): mixed 
    { 
        return Service::all();
    }

    public function findServiceId(mixed $id): Service
    { 
        return Service::findOrFail($id);  
    }

    public function serviceDelete()
    { 
        return (new Service)->delete();
    }
}
