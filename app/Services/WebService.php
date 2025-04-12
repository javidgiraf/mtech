<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\ProductImage;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceVideo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        DB::beginTransaction();

        try {
            $service = Service::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title'], '-'),
                'sub_title' => $data['sub_title'] ?? null,
                'content' => $data['content'],
                'image' => $data['image'],
                'description' => $data['description'],
            ]);

            if (isset($data['uploadImages'])) {
                foreach ($data['uploadImages'] as $key => $image) {
                    ServiceImage::create([
                        'service_id' => $service->id,
                        'image' => $image
                    ]);
                }
            }

            if (isset($data['applicationVideoTitle'])) {
                foreach ($data['applicationVideoTitle'] as $key => $value) {
                    ServiceVideo::create([
                        'service_id' => $service->id,
                        'title' => $value,
                        'video_url' => $data['applicationVideoUrl'][$key],
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Product creation failed: ' . $exception->getMessage());

            throw new \Exception($exception->getMessage());
        }

        return $service;
    }

    public function editService(int $id)
    {
        return Service::with('serviceImages', 'serviceVideos')->findOrFail($id);
    }

    public function updateService(int $id, array $data)
    {
        DB::beginTransaction();

        try {
            $service = Service::findOrFail($id);
            $serviceDetail = [
                'title' => $data['title'],
                'slug' => Str::slug($data['title'], '-'),
                'sub_title' => $data['sub_title'] ?? null,
                'content' => $data['content'],
                'description' => $data['description'] ?? null,
            ];

            if (isset($data['image'])) {
                $service->setImageAttribute($data['image']);
            }

            $service->update($serviceDetail);

            ServiceImage::where('service_id', $service->id)->whereNotIn('id', $data['serviceImageId'])->delete();
            if (isset($data['uploadImages'])) {
                foreach ($data['uploadImages'] as $key => $image) {

                    ServiceImage::create([
                        'service_id' => $service->id,
                        'image' => $image,
                    ]);
                }
            }


            if (isset($data['applicationVideoTitle'])) {
                ServiceVideo::where('service_id', $service->id)->delete();
                foreach ($data['applicationVideoTitle'] as $key => $value) {
                    ServiceVideo::create([
                        'service_id' => $service->id,
                        'title' => $value,
                        'video_url' => $data['applicationVideoUrl'][$key],
                    ]);
                }
            }

            DB::commit();

            return $service;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Service creation failed: ' . $e->getMessage());

            throw new \Exception($e->getMessage());
        }
    }

    public function deleteService(int $id)
    {
        return Service::findOrFail($id)->delete();
    }
}
