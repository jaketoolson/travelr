<?php
/**
 * Copyright (c) 2020. Jake Toolson
 */

namespace Orion\Travelr\Resources\Review;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => ReviewResource::collection($this->collection),
            'meta' => [
                'count' => $this->collection->count(),
            ],
        ];
    }

    public static function getLinks(): array
    {
        return [
            'self' => '',
        ];
    }
}
