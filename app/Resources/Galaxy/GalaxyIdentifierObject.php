<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Galaxy;

use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Models\Galaxy;

class GalaxyIdentifierObject extends Resource
{
    public function toArray($request): array
    {
        /** @var Galaxy $galaxy */
        $galaxy = $this->resource;

        return [
            'type' => 'galaxies',
            'id' => (string) $galaxy->id,
        ];
    }
}
