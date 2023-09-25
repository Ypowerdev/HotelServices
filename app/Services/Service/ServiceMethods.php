<?php 

namespace App\Services\Service;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceMethods
{ 

    public function list(): Collection
    { 
        return Service::all();
    }

    public function create($data): Service
    { 
        return Service::create($data); 
    }

    public function update($id, array $data): Service
    { 
        $service = $this->findServiceId($id);
        $service->update($data);

        return $service;
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
