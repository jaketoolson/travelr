<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\File;

use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Models\File;

class FileTransformer extends Resource
{
    public static $wrap;

    public function toArray($request): array
    {
        /** @var File $file */
        $file = $this->resource;

        return
            self::getIdentifiers($file)
            +
            [
                'attributes' => [
                'file_name' => $file->file_name,
                'file_path' => $file->file_path,
                'fileable_id' => (string) $file->fileable_id,
                'fileable_type' => $file->fileable_type,
            ],
            'links' => self::getLinks($file),
        ];
    }

    public static function getIdentifiers(File $file): array
    {
        return [
            'type' => 'files',
            'id' => (string) $file->id,
        ];
    }

    public static function getLinks(File $file): array
    {
        return [
            'self' =>  route('api.files.show', [$file->id]),
            'src' =>  url($file->file_path),
            'thumb_src' => url($file->thumbnail),
        ];
    }
}
