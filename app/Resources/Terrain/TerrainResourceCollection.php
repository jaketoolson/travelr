<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Terrain;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TerrainResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => TerrainResource::collection($this->collection),
            'links' => self::getLinks(),
            'meta' => [
                'count' => $this->collection->count(),
            ],
        ];
    }

    public static function getLinks(): array
    {
        return [
            'self' => route('api.terrains.index'),
        ];
    }
}
