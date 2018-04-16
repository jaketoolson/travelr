<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Orion\Travelr\Resources\Amenity\AmenityIdentifierObject;
use Orion\Travelr\Resources\Amenity\AmenityResourceCollection;

class PlanetAmenitiesRelationshipResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => AmenityIdentifierObject::collection($this->collection),
            'links' => AmenityResourceCollection::getLinks(),
        ];
    }
}
