<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Illuminate\Support\Facades\Cache;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Transformation;

class CloudinaryService
{
    protected $cloudinary;
    protected $cacheTimeout = 86400; // 24 hours

    public function __construct()
    {
        $this->cloudinary = new Cloudinary(config('cloudinary.url'));
    }

    public function uploadImage($file, $folder = null)
    {
        $options = [
            'folder' => $folder,
        ];

        $filePath = is_string($file) ? $file : $file->getRealPath();

        $result = $this->cloudinary->uploadApi()->upload($filePath, $options);

        return $result;
    }

    public function getImageUrl($publicId, $options = [])
    {
        $transformation = new Transformation();

        if (isset($options['width']) && isset($options['height'])) {
            if (isset($options['crop']) && $options['crop'] === 'fill') {
                $transformation->resize(Resize::fill($options['width'], $options['height'])->gravity(Gravity::auto()));
            } else {
                $transformation->resize(Resize::scale($options['width'], $options['height']));
            }
        } elseif (isset($options['width'])) {
            $transformation->resize(Resize::scale($options['width']));
        } elseif (isset($options['height'])) {
            $transformation->resize(Resize::scale()->height($options['height']));
        }

        return $this->cloudinary->image($publicId)->addTransformation($transformation)->toUrl();
    }

    public function getImageInfo($publicId)
    {
        $cacheKey = "cloudinary_image_info_{$publicId}";

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $result = $this->cloudinary->adminApi()->asset($publicId);
            $imageInfo = [
                'width' => $result['width'],
                'height' => $result['height'],
                'format' => $result['format'],
                'resource_type' => $result['resource_type'],
                'created_at' => $result['created_at'],
            ];

            Cache::put($cacheKey, $imageInfo, $this->cacheTimeout);

            return $imageInfo;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getPublicIdFromUrl($url)
    {
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'];
        $pathParts = explode('/', trim($path, '/'));
        $filename = end($pathParts);
        return pathinfo($filename, PATHINFO_FILENAME);
    }

    public function deleteImage($publicId)
    {
        return $this->cloudinary->uploadApi()->destroy($publicId);
    }
}