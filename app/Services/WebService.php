<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Support\Str;

class WebService
{
    public function getAllServices(int $perPage)
    {
        return Service::latest()
            ->paginate($perPage);
    }

    public function createService(array $data)
    {
        $service = new Service($data);

        if (isset($data['image'])) {
            $service->setImageAttribute($data['image']);
        }
        $service->slug = Str::slug($data['title'], '-');
        $service->save();

        return $service;
    }

    public function editService(int $id)
    {
        return Service::findOrFail($id);
    }

    public function updateService(int $id, array $data)
    {
        $service = Service::findOrFail($id);

        if (request()->hasFile('image')) {
            $service->setImageAttribute($data['image']);
        }
        $service->slug = Str::slug($data['title'], '-');
        $service->fill($data)->update();

        return $service;
    }

    public function deleteService(int $id)
    {
        return Service::findOrFail($id)->delete();
    }
}