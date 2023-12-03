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

    public function create(array $data): Service
    { 
        return Service::create($data); 
    }

    public function update(int $id, array $data): Service
    { 
        $service = $this->findServiceId($id);
        $service->update($data);

        return $service;
    }

    public function findServiceId(int $id): Service
    { 
        return Service::findOrFail($id);  
    }

    public function destroy(Service $service): bool
    { 
        return $service->delete();  
    }

}
