<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Orion\Travelr\Resources\Terrain\TerrainIdentifierObject;
use Orion\Travelr\Resources\Terrain\TerrainResourceCollection;

class PlanetTerrainsRelationshipResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => TerrainIdentifierObject::collection($this->collection),
            'links' => TerrainResourceCollection::getLinks(),
        ];
    }
}
