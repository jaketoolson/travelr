<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Amenity;

use Illuminate\Http\Resources\Json\Resource;

class AmenityIdentifierObject extends Resource
{
    public function toArray($request): array
    {
        return AmenityResource::getIdentifiers($this->resource);
    }
}
