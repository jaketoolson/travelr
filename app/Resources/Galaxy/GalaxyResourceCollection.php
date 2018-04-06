<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Galaxy;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GalaxyResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => GalaxyResource::collection($this->collection),
            'links' => [
                'self' => route('api.galaxies.index'),
            ],
            'meta' => [
                'count' => $this->collection->count(),
            ],
        ];
    }
}
