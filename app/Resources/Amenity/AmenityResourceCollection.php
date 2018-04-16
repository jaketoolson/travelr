<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Amenity;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AmenityResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => AmenityResource::collection($this->collection),
            'links' => self::getLinks(),
            'meta' => [
                'count' => $this->collection->count(),
            ],
        ];
    }

    public static function getLinks(): array
    {
        return [
            'self' => route('api.amenities.index'),
        ];
    }
}
