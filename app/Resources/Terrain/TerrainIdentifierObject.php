<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Terrain;

use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Models\Terrain;

class TerrainIdentifierObject extends Resource
{
    public function toArray($request): array
    {
        /** @var Terrain $terrain */
        $terrain = $this->resource;

        return [
            'type' => 'terrains',
            'id' => (string) $terrain->id,
        ];
    }
}
