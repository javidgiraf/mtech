<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Storage;

trait ImageTraits
{
    private function singleImage($model, $image, $path, $fileName = null)
    {
        $imageName = $fileName . rand(1, time()) . '.' . $image->getClientOriginalExtension();

        try {
            if (!env('CDN_ENABLED', false)) {
                $image = $image->getRealPath();
                $path = $path . '/';
                $disk = 'public';
            } else {
                $path = env('CDN_FILE_DIR', 'dev//') . $path . '/';
                $disk = 's3';
            }
            $img = $model::make($image);
            Storage::disk($disk)->put($path . $imageName, $img->stream()->detach(), 'public');

            return $imageName;
        } catch (Exception $e) {
            return false;
        }
    }

    private function blobImage($model, $image, $path, $fileName)
    {
        $imageName = $fileName . rand(1, time()) . '.jpg';

        try {
            if (!env('CDN_ENABLED', false)) {
                $image = $image->getRealPath();
                $path = $path . '/';
                $disk = 'public';
            } else {
                $path = env('CDN_FILE_DIR', 'dev/arn/') . $path . '/';
                $disk = 's3';
            }
            $img = $model::make($image);
            Storage::disk($disk)->put($path . $imageName, $img->stream()->detach(), 'public');

            return $imageName;
        } catch (Exception $e) {
            return false;
        }
    }

    private function copyImageFromUrl($model, $url, $path, $fileName)
    {
        $expectedExts = array('png', 'jpg', 'jpeg', 'gif');
        $extension = pathinfo($url, PATHINFO_EXTENSION);
        if (!in_array($extension, $expectedExts)) {
            $extension = 'png';
        }
        $imageName = $fileName . rand(1, time()) . '.' . $extension;
        try {
            if (!env('CDN_ENABLED', false)) {
                $path = $path . '/';
                $disk = 'public';
            } else {
                $path = env('CDN_FILE_DIR', 'dev/arn/') . $path . '/';
                $disk = 's3';
            }
            $img = $model::make($url);
            Storage::disk($disk)->put($path . $imageName, $img->stream()->detach(), 'public');

            return $imageName;
        } catch (Exception $e) {
            return false;
        }
    }

    private function uploadAnyFile($file, $path, $prefix = '')
    {

        if ($prefix) {
            $fName = $prefix . rand(1, time()) . '.' . $file->getClientOriginalExtension();
        } else {
            $fName = rand(1, time()) . '.' . $file->getClientOriginalExtension();
        }

        try {
            $file = $file->getRealPath();
            if (!env('CDN_ENABLED', false)) {
                $path = $path . '/';
                $disk = 'public';
            } else {
                $path = env('CDN_FILE_DIR', 'dev/arn/') . $path . '/';
                $disk = 's3';
            }
            Storage::disk($disk)->put($path . $fName, file_get_contents($file), 'public');
            
            return $fName;
        } catch (Exception $e) {
            
            return false;
        }
    }
}
