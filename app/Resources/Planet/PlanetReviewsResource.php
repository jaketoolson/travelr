<?php
/**
 * Copyright (c) 2020. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Orion\Travelr\Resources\Review\ReviewResource;

class PlanetReviewsResource extends ResourceCollection
{
    public const TYPE = 'review';

    public function toArray($request): array
    {
        return [
            'data' => ReviewResource::collection($this->collection),
            'links' => [
                'self' => route('api.planets.index'),
            ],
            'meta' => [
                'count' => $this->collection->count(),
            ],
        ];
    }
}
