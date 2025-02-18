<?php

namespace App\Services;

use App\Models\Sector;
use Illuminate\Support\Str;

class SectorService
{
    public function getAllSectors(int $perPage)
    {
        return Sector::latest()
            ->paginate($perPage);
    }

    public function createSector(array $data)
    {
        $sector = new Sector($data);

        if (isset($data['image'])) {
            $sector->setImageAttribute($data['image']);
        }
        $sector->slug = Str::slug($data['title'], '-');
        $sector->save();

        return $sector;
    }

    public function editSector(int $id)
    {
        return Sector::findOrFail($id);
    }

    public function updateSector(int $id, array $data)
    {
        $sector = Sector::findOrFail($id);

        if (request()->hasFile('image')) {
            $sector->setImageAttribute($data['image']);
        }
        $sector->slug = Str::slug($data['title'], '-');
        $sector->fill($data)->update();

        return $sector;
    }

    public function deleteSector(int $id)
    {
        return Sector::findOrFail($id)
            ->delete();
    }
}