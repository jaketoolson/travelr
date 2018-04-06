<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PlanetFeaturedResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => PlanetResource::collection($this->collection),
            'links' => [
                'self' => route('api.planets.featured.index'),
            ],
            'meta' => [
                'count' => $this->collection->count(),
            ],
        ];
    }
}
