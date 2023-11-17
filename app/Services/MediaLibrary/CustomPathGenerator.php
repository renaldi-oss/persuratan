<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator as BasePathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CustomPathGenerator implements BasePathGenerator
{
    /**
         * Get the path for the given media, relative to the root storage path.
         *
         * @param Media $media
         *
         * @return string
         */
        public function getPath(Media $media): string
        {
            return md5($media->id . config('app.key')) . '/';
        }

        /**
         * Get the path for conversions of the given media, relative to the root storage path.
         *
         * @param Media $media
         *
         * @return string
         */
        public function getPathForConversions(Media $media): string
        {
            return md5($media->id . config('app.key')) . '/conversions/';
        }

        /**
         * Get the path for responsive images of the given media, relative to the root storage path.
         *
         * @param Media $media
         *
         * @return string
         */
        public function getPathForResponsiveImages(Media $media): string
        {
            return md5($media->id . config('app.key')) . '/responsive-images/';
        }
}


