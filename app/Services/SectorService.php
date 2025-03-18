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
        DB::beginTransaction();

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

            $contents = $data['content'];

            foreach ($contents as $key => $content) {
                $sectorDetail = new SectorDetail();
                $sectorDetail->sector_id = $sector->id;
                $sectorDetail->description = $content;
                $sectorDetail->image = $data['sectorImage'][$key];
                $sectorDetail->location = $data['location'][$key];
                $sectorDetail->save();
            }

            DB::commit();

            return $sector;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Error($e->getMessage());
        }
    }

    public function editSector(int $id)
    {
        return Sector::with('sectorDetails')->findOrFail($id);
    }

    public function updateSector(int $id, array $data)
    {
        DB::beginTransaction();

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

            $contents = $data['content'];

            if (request()->hasFile('sectorImage')) {
                SectorDetail::where('sector_id', $id)->delete();
                foreach ($contents as $key => $content) {
                    $sectorDetail = new SectorDetail();
                    $sectorDetail->sector_id = $sector->id;
                    $sectorDetail->description = $content;
                    $sectorDetail->image = $data['sectorImage'][$key];
                    $sectorDetail->location = $data['location'][$key];
                    $sectorDetail->save();
                }
            }

            DB::commit();

            return $sector;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Error($e->getMessage());
        }
    }

    public function deleteSector(int $id)
    {
        return Sector::findOrFail($id)
            ->delete();
    }
}
