<?php

namespace Orion\Travelr\Transformers;

use Orion\Travelr\File;

class FileTransformer extends BaseTransformer
{
    /**
     * @param File $file
     * @return array
     */
    public function toArray($file): array
    {
        return [
            'id' => (int) $file->id,
            'uuid' => $file->uuid,
            'file_name' => $file->file_name,
            'file_path' => $file->file_path,
            'fileable_id' => (int) $file->fileable_id,
            'fileable_type' => $file->fileable_type,
            'file_thumbnail' => $file->thumbnail,
            'links' => [
                'self' => [
                    'rel' => 'self',
                    'uri' => url($file->file_path),
                ],
                'thumb' => [
                    'rel' => 'self',
                    'uri' => url($file->thumbnail),
                ]
            ]
        ];
    }
}
