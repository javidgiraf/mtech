<?php

namespace App\Services;

use App\Models\Service;

class ContentService 
{
    public function getAllServices($perPage)
    {
        return Service::latest()
            ->paginate($perPage);
    }

    public function createService(array $data)
    {
        return Service::create($data);
    }

    public function editService(Service $service)
    {
        return $service;
    }

    public function updateService(Service $service, array $data)
    {
        return $service->update($data);
    }

    public function deleteService(Service $service)
    {
        return $service->delete();
    }
}