<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Galaxy;

use Illuminate\Http\Resources\Json\Resource;

class GalaxyIdentifierObject extends Resource
{
    public function toArray($request): array
    {
        return GalaxyResource::getIdentifiers($this->resource);
    }
}
