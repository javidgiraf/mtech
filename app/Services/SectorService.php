<?php

namespace App\Services;

use App\Models\Sector;
use App\Models\SectorDetail;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Error;

class SectorService
{
    public function getAllSectors(int $perPage)
    {
        return Sector::latest()
            ->paginate($perPage);
    }

    public function createSector(array $data)
    {
        try {
            $sector = new Sector();
            $sector->title = $data['title'];
            $sector->sub_title = $data['sub_title'];
            if (isset($data['image'])) {
                $sector->setImageAttribute($data['image']);
            }
            $sector->slug = Str::slug($data['title'], '-');
            $sector->description = $data['description'];
            $sector->save();

            return $sector;
        } catch (Exception $e) {

            throw new Error($e->getMessage());
        }
    }

    public function editSector(int $id)
    {
        return Sector::findOrFail($id);
    }

    public function updateSector(int $id, array $data)
    {

        try {
            $sector = Sector::findOrFail(id: $id);
            $sector->title = $data['title'];
            $sector->sub_title = $data['sub_title'];
            if (isset($data['image'])) {
                $sector->setImageAttribute($data['image']);
            }
            $sector->slug = Str::slug($data['title'], '-');
            $sector->description = $data['description'];
            $sector->save();

            return $sector;
        } catch (Exception $e) {

            throw new Error($e->getMessage());
        }
    }

    public function deleteSector(int $id)
    {
        return Sector::findOrFail($id)->delete();
    }
}
