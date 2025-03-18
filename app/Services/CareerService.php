<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Career;
use Illuminate\Support\Str;

class CareerService
{
    public function getAllCareers($perPage)
    {
        return Career::latest()
            ->paginate($perPage);
    }

    public function createCareer(array $data)
    {
        $career = Career::create($data);

        return $career;
    }

    public function editCareer(int $id)
    {
        return Career::findOrFail($id);
    }

    public function updateCareer(int $id, array $data)
    {
        $career = Career::findOrFail($id);
        $career->fill($data)->update();

        return $career;
    }


    public function deleteCareer(int $id)
    {
        return Career::findOrFail($id)
            ->delete();
    }
}
