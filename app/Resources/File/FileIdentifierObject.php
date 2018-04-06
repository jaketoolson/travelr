<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\File;

use Orion\Travelr\Models\File;
use Illuminate\Http\Resources\Json\Resource;

class FileIdentifierObject extends Resource
{
    public function toArray($request): array
    {
        /** @var File $file */
        $file = $this->resource;

        return [
            'type' => 'files',
            'id' => (string) $file->id,
        ];
    }
}
