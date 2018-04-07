<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Terrain;

use Illuminate\Http\Resources\Json\Resource;

class TerrainIdentifierObject extends Resource
{
    public function toArray($request): array
    {
        return TerrainResource::getIdentifiers($this->resource);
    }
}
